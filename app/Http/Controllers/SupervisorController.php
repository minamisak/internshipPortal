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

public function supervisorfeedbackstoreView(Request $request, $supervisorId)
{
                $supervisor = User::findOrFail($supervisorId);
                $interns = DB::table('student_supervisor')
                    ->join('interns', 'student_supervisor.intern_id', '=', 'interns.id')
                    ->where('student_supervisor.supervisor_id', $supervisorId)
                    ->select('interns.*')
                    ->get();

                return view('supervisorFeedback', compact('supervisor','interns'));
}
public function supervisorfeedbackstore(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'supervisor_full_name' => 'required',
        'supervisor_title' => 'required',
        'intern_full_name' => 'required',
        'training_industry' => 'required',
        'training_field' => 'required',
        'training_round' => 'required',
        'considered_others' => 'required',
        'receptive_to_supervision' => 'required',
        'punctual_and_dependable' => 'required',
        'demonstrated_initiative' => 'required',
        'tasks_completed_efficiently' => 'required',
        'quality_of_completed_tasks' => 'required',
        'able_to_learn' => 'required',
        'critical_thinking_skills' => 'required',
        'academically_prepared' => 'required',
        'intern_strengths' => 'required',
        'intern_weaknesses' => 'required',
        'would_hire_intern' => 'required',
    ]);

    // Create a new instance of the model and set the properties
    $feedback = new SuperviseFeedbackStudent();
    $feedback->supervisor_full_name = $request->input('supervisor_full_name');
    $feedback->supervisor_title = $request->input('supervisor_title');
    $feedback->intern_full_name = $request->input('intern_full_name');
    $feedback->training_industry = $request->input('training_industry');
    $feedback->training_field = $request->input('training_field');
    $feedback->training_round = $request->input('training_round');
    $feedback->considered_others = $request->input('considered_others');
    $feedback->receptive_to_supervision = $request->input('receptive_to_supervision');
    $feedback->punctual_and_dependable = $request->input('punctual_and_dependable');
    $feedback->demonstrated_initiative = $request->input('demonstrated_initiative');
    $feedback->tasks_completed_efficiently = $request->input('tasks_completed_efficiently');
    $feedback->quality_of_completed_tasks = $request->input('quality_of_completed_tasks');
    $feedback->able_to_learn = $request->input('able_to_learn');
    $feedback->critical_thinking_skills = $request->input('critical_thinking_skills');
    $feedback->academically_prepared = $request->input('academically_prepared');
    $feedback->intern_strengths = $request->input('intern_strengths');
    $feedback->intern_weaknesses = $request->input('intern_weaknesses');
    $feedback->would_hire_intern = $request->input('would_hire_intern');

    // Save the feedback to the database
    $feedback->save();

    // Optionally, you can return a response or redirect to a success page
    return response()->json(['message' => 'Feedback stored successfully']);
}


    
}
