<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'code' => rand(1101, 1150),
            'cost' => rand(300, 500),
            'price' => rand(800, 1000),
            'stock' => rand(40, 99),
            'category_id' => Category::all()->random()->id,
            'image' => fake()->imageUrl(300, 300)
        ];
    }
}
