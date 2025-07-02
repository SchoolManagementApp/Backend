<?php

namespace Database\Seeders;

use App\Models\LecturerSubject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturerSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LecturerSubject::factory()->count(10)->create();
    }
}
