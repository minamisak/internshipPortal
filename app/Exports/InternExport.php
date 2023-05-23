<?php

namespace App\Exports;

use App\Models\Intern;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\Storage;


class InternExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Intern::all();
    }

    public function headings(): array
    {
        // return an array of headings
        return ['Name', 'Email','Mobile','City','Address','University','Bachelor Degree','Graduation Year','Major','Preferred Industry','Preferred Training Field','Grade','Certificate','Training Info','Source','Referral','First Language', 'First language rating', 'Second Langaue', 'Second language rating','What makes you best candidate'];
    }

    public function map($intern): array
    {
        // return an array of values to be mapped to columns
        $fileUrl = url('assets/'.$intern->grade_certificate);
        return [
            $intern->full_name,
            $intern->email,
            $intern->mobile,
            $intern->city,
            $intern->address,
            $intern->university,
            $intern->bachelor_degree,
            $intern->graduation_year,
            $intern->major,
            $intern->preferred_industry,
            $intern->preferred_training_field,
            $intern->grade,
            $fileUrl,
            $intern->training_info,
            $intern->source,
            $intern->referral_name,
            $intern->language1,
            $intern->language1_rating,
            $intern->language2,
            $intern->language2_rating,
            $intern->intern_opinion,
            

        ];
    }
}
