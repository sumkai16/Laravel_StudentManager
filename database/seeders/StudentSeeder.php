<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'firstname' => 'Juan',
                'lastname'  => 'Dela Cruz',
                'course'    => 'BSIT',
                'year_level' => '1st Year'
            ],
            [
                'firstname' => 'Maria',
                'lastname'  => 'Santos',
                'course'    => 'BSCS',
                'year_level' => '2nd Year'
            ],
            [
                'firstname' => 'Alex',
                'lastname'  => 'Reyes',
                'course'    => 'BSIS',
                'year_level' => '3rd Year'
            ],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
