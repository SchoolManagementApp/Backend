<?php

namespace Database\Factories;

use App\Models\Enrollement;
use App\Models\LecturerSubject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $score = $this->faker->numberBetween(0, 100); 
        $remarks = $score === 100 ? 'A+' :($score >= 80 ? 'A' :($score >= 65 ? 'B' :($score >= 50 ? 'C' :($score >= 35 ? 'D' :($score >= 21 ? 'F' : 'U')))));
       return [
            'id' => $this->faker->uuid(),
            'enrollement_id' => Enrollement::inRandomOrder()->first()?->id,
            'lecturer_subject_id' => LecturerSubject::inRandomOrder()->first()?->id,
            'score' => $score,
            'remarks' => $remarks
        ];
    }
}
