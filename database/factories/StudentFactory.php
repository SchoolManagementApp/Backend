<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Student::class;
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'birthday' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber(),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'course_id' => Course::inRandomOrder()->first()?->id, //If a classroom was found, return its id.If no classroom was found (for example, if the table is empty), return null instead of causing an error
            'photo' => $this->faker->imageUrl(200, 200, 'people')
        ];
    }
}
