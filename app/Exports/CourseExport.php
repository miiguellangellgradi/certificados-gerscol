<?php

namespace App\Exports;

use App\Models\Courses;

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
