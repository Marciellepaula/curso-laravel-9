<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->sentence,
            'price' => fake()->randomFloat(2, 0, 100),
            'description' => fake()->paragraph,
            'slug' => fake()->slug
        ];
    }
}
