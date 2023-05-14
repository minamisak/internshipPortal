<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSupervisor extends Model
{
    protected $table = 'student_supervisor';
    
    protected $fillable = ['intern_id', 'supervisor_id'];
    
    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }
    
    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }
}
