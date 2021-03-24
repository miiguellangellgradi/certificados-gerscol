<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'student_name' => Str::random(10),
            'student_description' => Str::random(10),
            'student_mail' => Str::random(10),
            'student_age' => Str::random(10),
        ]);
    }
}
