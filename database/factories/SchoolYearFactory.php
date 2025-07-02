<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolYear>
 */
class SchoolYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate a random start date (e.g., between 2010 and 2025)
        $startDate = $this->faker->date('Y-m-d', '2025-12-31'); // up to end of 2025

        // Generate an end date that is after the start date, within a reasonable range (e.g., up to 1 year later)
        $endDate = $this->faker->dateTimeBetween($startDate, '+1 year')->format('Y-m-d');

        // Build year_name from the years of the dates
        $yearName = date('Y', strtotime($startDate)) . '-' . date('Y', strtotime($endDate));

        return [
            'year_name' => $yearName,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];

    }
}
