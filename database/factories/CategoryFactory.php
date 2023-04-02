<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->colorName(),
            'user_id' => fake()->numberBetween($min =1, $max =3),
            'slug' => Str::slug(fake()->colorName()),
            'description' => fake()->text(),
            'photo' => 'cat.jpg',
        ];
    }
}
