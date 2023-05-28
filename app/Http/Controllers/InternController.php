<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SupervisorController;

use Illuminate\Support\Facades\DB;

use App\Models\Intern;
use App\Models\User;
use App\Exports\InternExport;
use App\Exports\InternExportAccepted;
use App\Models\StudentSupervisor;
use App\Models\StudentProgramFeedback;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;



class InternController extends Controller
{
    //
    

    public function login()
    {
           
        return view('login');
    }
    
    public function logout()
    {
        Session::forget('intern_id');
        Session::forget('id');
        return redirect('/')->with('success', 'Logged out successfully!');
        
    }
    
    public function dashboard()
    {
        
        return view('dashboard');
    }

    //check mail existance 

    public function checkMail(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:interns,email',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Email already exists'], 422);
            }

            return response()->json(['message' => 'Email is available'], 200);
        }

        
    public function supervisorView()
    {
        if(session()->has('id')){
        $this->supervisorController = new SupervisorController();
        $user_id = session('id');
        $user = User::where('id',$user_id)->first();
        $supervisorData = $this->supervisorController->getAllInternsForThisSuperVisor($user_id);
        return view('supervisor', compact('user', 'supervisorData'));
        }
    }


    public function accept(Request $request, $id)
{
    $intern = Intern::findOrFail($id);
    $intern->IsAccepted = $request->input('is_accepted') == 'true' ? true : false;
    $intern->save();
    
    
    
    return response()->json(['success' => 'true']);
}

public function showProfile($id)
{
    // $intern = Intern::findOrFail($id);
    
    $intern = DB::table('interns')
  ->join('student_supervisor', 'interns.id', '=', 'student_supervisor.intern_id')
  ->join('users', 'student_supervisor.supervisor_id', '=', 'users.id')
  ->select('interns.IsAccepted as IsAccepted','interns.full_name','interns.preferred_industry', 'interns.email', 'users.name', 'users.email')
  ->where('interns.id', $id)
  ->first();
  // if null return view without assignment
  

return view('internevalform', compact('intern'));
}


public function exportInterns()
    {
        return Excel::download(new InternExport, 'Interns.xlsx');

    }
public function exportAcceptedInterns()
{
    return Excel::download(new InternExportAccepted, 'Accepted Interns.xlsx');
}
public function secondRegistration()
{
    return view('internevalform');

}
    public function adminDashboard()
    {
        $interns = Intern::all();
        return view('dashboard', compact('interns'));
        
    }

    public function hrDashBoard()
    {
        $students = DB::table('interns')->get();
        

        return view('dashboard', ['students' => $students]);


    }
    // public function processLogin(Request $request)
    // {
    //     if (session()->has('intern_id')) {
    //         // Intern ID is present in the session
    //         $internId = session('intern_id');
    //         $intern = Intern::where('id',$internId)->first();
    //         if($intern->IsAccepted == true)
    //         {
    //             $id = $intern->id;
    //             return $this->showProfile($id);
    //         }
    //         else{
    //             return view('internevalform', compact('intern'));   
    //         }
            
    //         // Do something with the intern ID
    //     } else {
    //         // Intern ID is not present in the session
    //         // Redirect or show an error message
    //         $validator = Validator::make($request->all(), [
    //             'email' => 'required|email',
    //             'password' => 'required',
    //         ]);
        
    //         if ($validator->fails()) {
    //             return response()->json(['error' => $validator->errors()], 400);
    //         }
        
    
    //         // login for interns 
    //         $intern = Intern::where('email', $email)
    //             ->where('password', $password)
    //             ->first();
            
    
    //             //login for admins from elswedy
    //             if(strpos($request->input('email'), '@elsewedy-ind.com') !== false){
    //                 $user = User::where('email',$email)->where('password',$password)->first();
    //                 if($user->type == 'hr')
    //                 {
    //                     session()->put('id', $user->id);
    //                     return redirect('hr');
    //                 }
    //                 elseif($user->type == 'supervisor')
    //                 {
        
    //                     session()->put('id', $user->id);
    //                     $this->supervisorController = new SupervisorController();
        
    //                     $supervisorData = $this->supervisorController->getAllInternsForThisSuperVisor($user->id);
        
    //                     return view('supervisor',compact('user','supervisorData'));
    //                 }
    //                 else{
    //                     return redirect()->back()->with('error', 'Invalid email or password.1');
    //                 }
        
    //                 // if ($user) {
    //                 //     session()->put('id', $user->id);
    //                 //     return redirect('adminDashboard');
    //                 // } else {
    //                 //     return redirect()->back()->with('error', 'Invalid email or password.');
    //                 // }
    //             }
    //             elseif ($intern) {
    //                 session()->put('intern_id', $intern->id);
    //                 if($intern->IsAccepted == true)
    //                 {
    //                     $id = $intern->id;
    //                     return $this->showProfile($id);
    //                 }
    //                 else{
    //                     return view('internevalform', compact('intern'));   
    //                 }
    //         } 
    //         else {
    //             return redirect()->back()->with('error', 'Invalid email or password');
    //         }
    //     }
        
    // }

    public function processLogin(Request $request)
        {

            if (session()->has('intern_id')) {
                // Intern ID is present in the session
                // ...
                        $internId = session('intern_id');
                        $intern = Intern::where('id',$internId)->first();
                        
                        if($intern->IsAccepted == true)
                        {
                            $id = $intern->id;
                            return $this->showProfile($id);
                        }
                        else{
                            return view('internevalform', compact('intern'));   
                        }
            } else {
                // Intern ID is not present in the session
            

                $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $email = $request->input('email');
                $password = $request->input('password');

                // login for interns
                $intern = Intern::where('email', $email)
                    ->where('password', $password)
                    ->first();
                
                // login for admins from elsewedy
                if (strpos($email, '@elsewedy-ind.com') !== false) {
                    
                    $user = User::where('email', $email)->where('password', $password)->first();
                    if ($user) {
                        if ($user->type == 'hr') {
                            session()->put('id', $user->id);
                            return redirect('hr');
                        } elseif ($user->type == 'supervisor') {

                            session()->put('id', $user->id);
                            $this->supervisorController = new SupervisorController();
                            $supervisorData = $this->supervisorController->getAllInternsForThisSuperVisor($user->id);
                            return view('supervisor', compact('user', 'supervisorData'));
                        } else {
                            return redirect()->back()->with('error', 'Invalid email or password.1');
                        }
                    } else {
                        return redirect()->back()->with('error', 'Invalid email or password.');
                    }
                } elseif ($intern) {
                    session()->put('intern_id', $intern->id);
                    if ($intern->IsAccepted == true) {
                        $id = $intern->id;
                        return $this->showProfile($id);
                    } else {
                        return view('internevalform', compact('intern'));
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid email or password');
                }
            }
        }


        //intern feedback

        public function showFeedbackForm(Request $request, $internId)
            {
                $intern = Intern::findOrFail($internId);

                return view('studentFeedback', compact('intern'));
            }

        public function storeFeedback(Request $request)
        {
            // Validate the form data
        
            // Create a new instance of the feedback model
            $feedback = new StudentProgramFeedback();
        
            // Assign the form data to the feedback model
            $feedback->intern_id = 1;
            $feedback->supervisor_id = 1;
            $feedback->intern_full_name = $request->input('full_name');
            $feedback->mobile_number = $request->input('mobile_number');
            $feedback->training_industry = $request->input('training_industry');
            $feedback->supervisor_full_name = $request->input('supervisor_full_name');
            $feedback->supervisor_title = $request->input('supervisor_title');
            $feedback->orientation_sufficient = $request->input('orientation_sufficient');
            $feedback->oversee_work = $request->input('oversee_work');
            $feedback->supervisor_available = $request->input('supervisor_available');
            $feedback->challenging_internship = $request->input('challenging_internship');
            $feedback->practical_skills = $request->input('practical_skills');
            $feedback->positive_work_environment = $request->input('positive_work_environment');
            $feedback->build_network = $request->input('build_network');
            $feedback->recommend_internship = $request->input('recommend_internship');
            $feedback->consider_working_organization= $request->input('consider_working_organization	');
            $feedback->comments = $request->input('other_comments');
        
            // Save the feedback to the database
            $feedback->save();

            if($feedback->save()){

                return redirect('login')->with('Sucess ', 'Thanks for your feedback. ');

            }
            else{
                return redirect()->back()->with('error', 'Incorrect values');

            }
        
            // Redirect or show a success message
            
        }
        


}
