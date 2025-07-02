<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\SchoolYear;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentLevel>
 */
class StudentLevelFactory extends Factory
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
            'student_id' => Student::inRandomOrder()->first()?->id,
            'level_id' => Level::inRandomOrder()->first()?->id,
            'year_id' => SchoolYear::inRandomOrder()->first()?->id,
            'status' => $this->faker->randomElement(['starting', 'ongoing'])
        ];
    }
}
