<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            [
                'subject_code' => 'IT101',
                'subject_name' => 'Introduction to IT',
                'description'  => 'Basic overview of Information Technology.',
                'year_level'   => 1,
                'units'        => 3,
            ],
            [
                'subject_code' => 'CS202',
                'subject_name' => 'Data Structures',
                'description'  => 'Core data structures and algorithms.',
                'year_level'   => 2,
                'units'        => 4,
            ],
            [
                'subject_code' => 'IS301',
                'subject_name' => 'Systems Analysis',
                'description'  => 'Techniques for analyzing and designing systems.',
                'year_level'   => 3,
                'units'        => 3,
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
