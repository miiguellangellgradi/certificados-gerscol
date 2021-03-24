<?php

namespace App\Exports;

use App\Models\Courses;
use Maatwebsite\Excel\Concerns\FromCollection;

class CourseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Courses::all();
    }
}
