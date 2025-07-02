<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollement;
use App\Models\Lecturer;
use App\Models\LecturerSubject;
use App\Models\Subject;

//use App\Models\User;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $students = Enrollement::all();
        $subjects = Subject::all();
        $lecturers = LecturerSubject::all(); // Changed from User to Lecturer

        // Check for empty data
        if ($students->isEmpty() || $subjects->isEmpty() || $lecturers->isEmpty()) {
            $this->command->warn('Skipping GradeSeeder: enrollement, subjects, or lecturers table is empty!');
            return;
        }

        foreach ($students as $student) {
            //$courseCount = min(5, $courses->count());If you have 5 or more courses, $courseCount will be 5. If you have fewer than 5 courses (for example, just 1), $courseCount will be 1.
            $subjectCount = $subjects->count();//count all courses exist
            //dump($subjectCount);
            foreach ($subjects->random($subjectCount) as $subject) {
                Grade::factory()->create([
                    'enrollement_id' => $student->id,
                    'lecturer_subject_id' => $lecturers->random()->id, // Changed from teacher_id
                ]);
            }
        }
    }
}
