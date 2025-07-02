<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Level>
 */
class LevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "id" => $this->faker->uuid(),
            'course_id' => Course::inRandomOrder()->first()?->id,
            "level_name" => $levelName = $this->faker->randomElement(['Bachelor', 'Master']),
            'level_number' => $levelName === 'Bachelor' ? 3 : 5,
        ];
    }
}
