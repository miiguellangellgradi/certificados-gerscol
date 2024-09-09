<?php

namespace App\Imports;

use App\Models\Courses;

class CourseImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Courses([
            'course_name' => $row[0],
            'course_validation' => $row[1],
            'course_description' => $row[2],
            'course_duration' => $row[3],
        ]);
    }
}
