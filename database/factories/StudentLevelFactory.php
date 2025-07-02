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
            // Get a random Level instance
            'level_id' => $level = Level::inRandomOrder()->first(),
            'school_year_id' => SchoolYear::inRandomOrder()->first()?->id,
            // 'level' is a random number between 1 and the level_number of the selected Level
            'level' => $level ? $this->faker->numberBetween(1, $level->level_number) : null,
            'cursus' => $level ->level_name

        ];
    }
}
