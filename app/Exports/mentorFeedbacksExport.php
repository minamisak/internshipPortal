<?php

namespace App\Exports;

use App\Models\SuperviseFeedbackStudent;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\Storage;


class MentorFeedbacksExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SuperviseFeedbackStudent::all();
    }

    public function headings(): array
    {
        // return an array of headings
        return ['Mentor Name','Intern Full Name','Industry', 'Training Field','Training Round','Objectively considered ideas','Was receptive to supervision?','Was punctual and dependable?','Demonstrated initiative?','Tasks were completed in an efficient manner?','Quality of completed tasks met expectations?','Able to learn new skills?','Effectively solved problems?','Was academically prepared for internship?','What were the interns strengths?','What were the interns weaknesses?','I would hire this intern'];
    }

    public function map($all_feedback): array
    {
        // return an array of values to be mapped to columns
        
        return [
            $all_feedback->supervisor_full_name,
            $all_feedback->intern_full_name,
            $all_feedback->training_industry,
            $all_feedback -> training_field,
            $all_feedback -> training_round,
            $all_feedback -> considered_other_people,
            $all_feedback -> receptive,
            $all_feedback -> punctual_and_dependable,
            $all_feedback -> demonstrated_completed_tasks,
            $all_feedback -> quality_of_completed_tasks,
            $all_feedback -> able_to_learn,
            $all_feedback -> critical_thinking,
            $all_feedback -> academically_prepared,
            $all_feedback -> intern_strengths,
            $all_feedback -> intern_weaknesses,
            $all_feedback -> hire_intern
        ];
    }
}
