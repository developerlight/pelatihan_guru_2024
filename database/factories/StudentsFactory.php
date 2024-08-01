<?php

namespace Database\Factories;

use App\Models\Addresses;
use App\Models\Genders;
use App\Models\Religions;
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
            'gender_id' => Genders::inRandomOrder()->first()->id,
            'birth_date' => fake()->date(),
            'birth_place' => fake()->city(),
            'religion_id' => Religions::inRandomOrder()->first()->id,
            'citizenship' => fake()->country(),
            'child_order' => fake()->randomNumber(1),
            'sibling_count' => fake()->randomNumber(1),
            'language' => fake()->word(),
        ];
    }
}
