<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserMeta>
 */
class UserMetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'       => User::get()->random()->id,
            'description'   => fake()->paragraph(),
            'address'       => fake()->address(),
            'profile_photo' => 'profile.png',
        ];
    }
}
