<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SupervisorController;

use Illuminate\Support\Facades\DB;

use App\Models\Intern;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class InternController extends Controller
{
    //
    

    public function login()
    {
           
        return view('login');
    }
    
    public function logout()
    {
        Session::forget('id');
        return redirect('/')->with('success', 'Logged out successfully!');
        
    }
    
    public function dashboard()
    {
        
        return view('dashboard');
    }


    public function accept(Request $request, $id)
{
    $intern = Intern::findOrFail($id);
    $intern->IsAccepted = $request->input('is_accepted') ? true : false;
    $intern->save();
    
    return response()->json(['success' => true]);
}

public function showProfile($id)
{
    $intern = Intern::findOrFail($id);
    return view('internevalform', compact('intern'));
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
    public function processLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // login for interns 
        $intern = Intern::where('email', $email)
            ->where('password', $password)
            ->first();

        //login for admins from elswedy
        if(strpos($request->input('email'), '@elsewedy-ind.com') !== false){
            $user = User::where('email',$email)->where('password',$password)->first();
            if($user->type == 'hr')
            {
                session()->put('id', $user->id);
                return redirect('hr');
            }
            elseif($user->type == 'supervisor')
            {

                session()->put('id', $user->id);
                $this->supervisorController = new SupervisorController();

                $supervisorData = $this->supervisorController->getAllInternsForThisSuperVisor($user->id);

                return view('supervisor',compact('user','supervisorData'));
            }
            else{
                return redirect()->back()->with('error', 'Invalid email or password.1');
            }

            // if ($user) {
            //     session()->put('id', $user->id);
            //     return redirect('adminDashboard');
            // } else {
            //     return redirect()->back()->with('error', 'Invalid email or password.');
            // }
        }elseif ($intern) {
            session()->put('intern_id', $intern->id);
            if($intern->IsAccepted == true)
            {
                $id = $intern->id;
                return $this->showProfile($id);
            }
            else{
                return view('internevalform', compact('intern'));   
            }
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

}
