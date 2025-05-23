<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            ['name' => 'Computer Engineering', 'department' => 'Engineering', 'fee' => 15000],
            ['name' => 'Civil Engineering', 'department' => 'Engineering', 'fee' => 14000],
            ['name' => 'Marketing', 'department' => 'Business Management', 'fee' => 12000],
            ['name' => 'Human Resources', 'department' => 'Business Management', 'fee' => 11000],
            ['name' => 'English Literature', 'department' => 'English', 'fee' => 10000],
            ['name' => 'English Language', 'department' => 'English', 'fee' => 9000],
            ['name' => 'Hotel Management', 'department' => 'Hospitality', 'fee' => 13000],
            ['name' => 'Tourism', 'department' => 'Hospitality', 'fee' => 12500],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
