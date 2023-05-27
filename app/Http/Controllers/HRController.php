<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intern;
use App\Models\User;
use App\Models\StudentSupervisor;

use App\Imports\UserImporter;
use Maatwebsite\Excel\Facades\Excel;

class HRController extends Controller
{
    //
    public function assignPage()
    {
        $supervisors = User::where('type','supervisor')->get();
        $interns = Intern::where('IsAccepted', 1)->get();

        return view('hrAssigndashboard',compact('supervisors','interns'));
    }
    public function assign(Request $request)
        {
            // Get the supervisor
            $supervisor = User::where('id', $request->supervisor)
                            ->where('type', 'supervisor')
                            ->firstOrFail();

            // Get the intern
            $intern = Intern::where('id', $request->intern)->firstOrFail();

            // Attach the intern to the supervisor
            $studentSupervisor = new StudentSupervisor();
            $studentSupervisor->supervisor_id = $supervisor->id;
            $studentSupervisor->intern_id = $intern->id;
            $studentSupervisor->save();

            // Return a success response
            return redirect('/hr')->with('success', 'Intern assigned to supervisor successfully.');
            
        }


        public function addNewUserAdmin(Request $request)
                {
                    $user = new User;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = "12345";
                    $user->type = $request->type;
                    $user->industry = $request->industry;
                    $user->save();

                    return redirect()->back()->with('success', 'User added successfully!');
                }


        public function getUsersAndInterns(Request $request)
        {
            $industry = $request->input('industry');
            
            // Retrieve users with the specified industry
            $users = User::where('industry', $industry)->get();
            
            // Retrieve interns with the preferred industry matching users
            $interns = Intern::where(['preferred_industry'=> $industry, 'IsAccepted'=>1])->get();
            
            // Combine users and interns into a single array
            $results = $users->concat($interns);
            
            return response()->json([
                'data' => [
                    'users' => $users,
                    'interns' => $interns
                ]
            ]);
        }

public function getUserAndInternData()
{
    $studentSupervisors = StudentSupervisor::with('supervisor', 'intern')->get();

    $data = $studentSupervisors->map(function ($studentSupervisor) {
        return [
            'user_id' => $studentSupervisor->supervisor->id,
            'user_name' => $studentSupervisor->supervisor->name,
            'user_email' => $studentSupervisor->supervisor->email,
            'user_industry' => $studentSupervisor->supervisor->industry,
            'intern_id' => $studentSupervisor->intern->id,
            'intern_full_name' => $studentSupervisor->intern->full_name,
            'intern_email' => $studentSupervisor->intern->email,
            'intern_industry' => $studentSupervisor->intern->preferred_industry,
        ];
    });

    return $data;
}

public function showAssignedStudent()
{
    $data = $this->getUserAndInternData();

    return view('assignedstudents', compact('data'));
}

public function removeAssignedStudent($id)
{
    // Find the intern
    // Remove the associated row from the StudentSupervisor table
    StudentSupervisor::where('intern_id', $id)->delete();
    
    // Return a response indicating success
    return response()->json(['message' => 'Intern removed successfully']);
}

public function removeSupervisors($id)
{
    // Find the intern
    // Remove the associated row from the StudentSupervisor table
    User::where('id', $id)->delete();
    
    // Return a response indicating success
    return response()->json(['message' => 'Intern removed successfully']);
}



    public function getAllSupervisors(Request $request)
    {
        $supervisors = User::all();

        return view('allSupervisors',compact('supervisors'));
    }


    public function import(Request $request)
        {
            $file = $request->file('file');

            Excel::import(new UserImporter, $file);
            

            return redirect()->back()->with('success', 'Data imported successfully.');
        }


}
