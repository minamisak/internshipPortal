<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Intern;
use App\Models\StudentSupervisor;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

class SupervisorController extends Controller
{
    //

    public function getAllInternsForThisSuperVisor($supervisorId)
    {
        $internIds = DB::table('student_supervisor')
            ->join('users', 'student_supervisor.supervisor_id', '=', 'users.id')
            ->join('interns', 'student_supervisor.intern_id', '=', 'interns.id')
            ->where('users.type', 'supervisor')
            ->where('users.id', $supervisorId)
            ->pluck('interns.id');
            
        $interns = Intern::whereIn('id', $internIds)->get();

        return $interns;


    }
    public function resetPassword($userId, Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'password' => 'required|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        // return redirect()->back()->withErrors($validator)->withInput();
        return redirect()->route('supervisor')->with('error','Invalid user ID', 400);

    }

    // Retrieve the user by ID
    $user = User::find($userId);

    if (!$user) {
        // return redirect()->back()->with('error', 'Invalid user ID');
        return redirect()->route('supervisor')->with('error','Invalid user ID', 400);

    }

    // Update the user's password
    $user->password = $request->input('password');
    $user->save();
    return redirect()->route('supervisor')->with('success', 'Password reset successfully');

    // return redirect()->back()->with('success', 'Password reset successfully');
}


    
}
