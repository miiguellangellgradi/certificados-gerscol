<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'Course_name' => Str::random(10),
            'Course_description' => Str::random(10),
            'Course_duration' => Str::random(10),
            'Course_validation' => Str::random(10),
        ]);
    }
}
