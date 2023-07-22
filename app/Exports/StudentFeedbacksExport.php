<?php

namespace App\Exports;

use App\Models\StudentProgramFeedback;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\Storage;

//here it is
//name
class StudentFeedbacksExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return StudentProgramFeedback::all();
    }

    public function headings(): array
    {
        // return an array of headings
        return ['Intern Full Name','Mobile Number','Mentor Name','Orientation Sufficient','Supervisor Available','Challenging Internship','Practical Skills','Positive Work Environment','Build Network','Recommend Internship','comments','Training Industry'];
    }

    public function map($all_feedback): array
    {
        // return an array of values to be mapped to columns
        
        return [
            $all_feedback->intern_full_name,
            $all_feedback->mobile_number,
            $all_feedback -> supervisor_full_name,
            $all_feedback -> orientation_sufficient,                
            $all_feedback -> supervisor_available,
            $all_feedback -> challenging_internship,
            $all_feedback -> practical_skills,
            $all_feedback -> positive_work_environment,
            $all_feedback -> build_network,
            $all_feedback -> recommend_internship,                
            $all_feedback -> comments,
            $all_feedback -> training_industry,

        ];
    }
}
