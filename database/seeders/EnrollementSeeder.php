<?php

namespace Database\Seeders;

use App\Models\Enrollement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enrollement::factory()->count(20)->create();
    }
}
