<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Intern;
use App\Models\User;
use App\Models\StudentSupervisor;

class HRController extends Controller
{
    //
    public function assignPage()
    {
        $supervisors = User::where('type','supervisor')->get();
        $interns = Intern::where('IsAccepted','1')->get();
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
            return response()->json(['message' => 'Intern assigned to supervisor successfully.']);
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

        public function getAllSupervisors(Request $request)
        {
            $supervisors = User::where('type','supervisor')->get();

            return view('allSupervisors',compact('supervisors'));
        }


}
