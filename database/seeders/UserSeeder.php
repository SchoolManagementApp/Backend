<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        User::factory()->create([
            'name' => 'test Admin',
            'email' => 'admin@test.com',
            'role' => 'admin',
            'gender' => 'male',
            'password' => 'admin123',
        ]);

        User::factory()->create([
            'name' => 'test Lecturer',
            'email' => 'lecturer@test.com',
            'role' => 'lecturer',
            'gender' => 'female',
        ]);

        User::factory()->count(5)->create([
            'role' => 'student',
        ]);
    }
}
