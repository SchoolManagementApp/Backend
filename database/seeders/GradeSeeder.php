<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Course;
use App\Models\Lecturer;
//use App\Models\User;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $students = Student::all();
        $courses = Course::all();
        $lecturers = Lecturer::all(); // Changed from User to Lecturer

        // Check for empty data
        if ($students->isEmpty() || $courses->isEmpty() || $lecturers->isEmpty()) {
            $this->command->warn('Skipping GradeSeeder: students, courses, or lecturers table is empty!');
            return;
        }

        foreach ($students as $student) {
            //$courseCount = min(5, $courses->count());If you have 5 or more courses, $courseCount will be 5. If you have fewer than 5 courses (for example, just 1), $courseCount will be 1.
            $courseCount = $courses->count();//count all courses exist
            dump($courseCount);
            foreach ($courses->random($courseCount) as $course) {
                Grade::factory()->create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'lecturer_id' => $lecturers->random()->id, // Changed from teacher_id
                ]);
            }
        }
    }
}
