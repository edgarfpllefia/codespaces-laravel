<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

public function definition(): array
{
    return [
        'name'     => fake('es_ES')->name(),
        'role'     => fake()->randomElement(['admin', 'user']),
        'email'    => fake('es_ES')->unique()->safeEmail(),
        'password' => bcrypt('password'),
    ];
}
}
