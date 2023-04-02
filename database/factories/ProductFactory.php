<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
            'user_id' => fake()->numberBetween($min =1, $max =3),
            'title' => fake()->sentence(),
            'slug' => Str::slug(fake()->sentence()),
            'price' => fake()->randomNumber(4),
            'sale_price' => fake()->randomNumber(4),
            'image' => 'product.png',
            'shot_description' => fake()->text(),
        ];
    }
}
