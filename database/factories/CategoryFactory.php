<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

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

//Para que me cree los elementos con sentido con el seeder
public function definition(): array
{
    return [
        'name'        => fake()->randomElement(['Camisetas', 'Pantalones', 'Zapatos', 'Chaquetas', 'Vestidos', 'Abrigos', 'Sudaderas', 'Faldas']),
        'description' => fake()->randomElement(['Ropa de temporada', 'Colección verano', 'Colección invierno', 'Ropa deportiva', 'Ropa casual', 'Ropa formal']),
    ];
}
}
