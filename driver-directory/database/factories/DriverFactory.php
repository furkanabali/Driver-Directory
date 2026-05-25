<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DriverFactory extends Factory
{
    public function definition(): array
    {
        return [
            'full_name' => fake('tr_TR')->name(),
            'phone' => fake()->unique()->numerify('5#########'),
            'vehicle_type' => fake()->randomElement(['Otomobil', 'Minivan', 'Kamyonet', 'Motosiklet']),
            'status' => fake()->randomElement(['active', 'inactive']),
        ];
    }
}