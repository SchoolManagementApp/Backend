<?php

namespace Database\Seeders;

use App\Models\StudentLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentLevel::factory()->count(5)->create();
    }
}
