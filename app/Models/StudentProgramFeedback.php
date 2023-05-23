<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProgramFeedback extends Model
{
    use HasFactory;
    protected $table = 'student_program_feedbacks';

    protected $fillable = [
        'intern_full_name',
        'mobile_number',
        'training_industry',
        'supervisor_full_name',
        'supervisor_title',
        'orientation_sufficient',
        'oversee_work',
        'supervisor_available',
        'challenging_internship',
        'practical_skills',
        'positive_work_environment',
        'build_network',
        'recommend_internship',
        'consider_working_organization',
        'comments',
    ];

}
