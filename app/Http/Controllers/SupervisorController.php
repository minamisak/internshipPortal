<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Intern;
use App\Models\StudentSupervisor;
use Illuminate\Support\Facades\DB;


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

    
}
