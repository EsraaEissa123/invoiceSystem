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
    public function definition()
    {
        return [
            'name' => fake()->word(),
            'purchase_price' => fake()->randomDigitNotZero(),
            'sell_price' => fake()->randomDigitNotZero(),
            'amount'=>fake()->numberBetween(0,1000),
            'category_id'=> Category::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
