<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coffee>
 */
class CoffeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name' => fake()->unique()->numerify('кофе####'),
            'type_name' => fake()->randomElement(['тип-a', 'тип-b', 'тип-c', 'тип-d', 'тип-e']),
            'calories' => fake()->randomFloat(1, 2, 10)

        ];
    }
}
