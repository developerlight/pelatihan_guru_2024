<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nisn' => fake()->unique()->randomNumber(9),
            'full_name' => fake()->name(),
            'call_name' => fake()->name(),
            'gender' => fake()->word(),
            'birth_date' => fake()->date(),
            'birth_place' => fake()->city(),
            'religion' => fake()->word(),
            'citizenship' => fake()->country(),
            'child_order' => fake()->randomNumber(1),
            'sibling_count' => fake()->randomNumber(1),
            'language' => fake()->word(),
        ];
    }
}
