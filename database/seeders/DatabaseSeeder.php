<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            DepartmentSeeder::class,
            SchoolYearSeeder::class,
            LecturerSeeder::class,
            CourseSeeder::class,
            StudentSeeder::class,
            LevelSeeder::class,
            StudentLevelSeeder::class,
            SubjectSeeder::class,
            EnrollementSeeder::class,
            LecturerSubjectSeeder::class,
            GradeSeeder::class,
        ]);
    }
}
