<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperviseFeedbackStudent extends Model
{
    use HasFactory;
    protected $table = 'supervise_feedback_students';
    protected $fillable = [
        'supervisor_full_name',
        'supervisor_id',
        'supervisor_title',
        'intern_full_name',
        'intern_id',
        'training_industry',
        'training_field',
        'training_round',
        'considered_other_people',
        'receptive_to_supervision',
        'punctual_and_dependable',
        'demonstrated_initiative',
        'tasks_completed_efficiently',
        'quality_of_completed_tasks',
        'able_to_learn_new_skills',
        'critical_thinking_skills',
        'academically_prepared',
        'intern_strengths',
        'intern_weaknesses',
        'would_hire_this_intern',
    ];
}
