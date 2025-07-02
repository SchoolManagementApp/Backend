<?php

namespace Database\Factories;

use App\Models\Lecturer;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LecturerSubject>
 */
class LecturerSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'lecturer_id' => Lecturer::inRandomOrder()->first()?->id,
            'subject_id' => Subject::inRandomOrder()->first()?->id,
        ];
    }
}
