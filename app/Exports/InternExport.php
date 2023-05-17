<?php

namespace App\Exports;

use App\Models\Intern;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

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
        return ['Name', 'Email','Mobile','City','Address','University','Bachelor Degree','Graduation Year','Major','Preferred Industry','Preferred Training Field','Grade','Training Info', 'Created At', 'Updated At'];
    }

    public function map($intern): array
    {
        // return an array of values to be mapped to columns
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
            $intern->training_info,
            $intern->source,
            $intern->created_at,
            $intern->updated_at,
        ];
    }
}
