<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

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

//Para que me cree los productos con sentido
public function definition(): array
{
    return [
        'name'        => fake()->randomElement(['Camiseta básica', 'Vaqueros slim', 'Zapatillas blancas', 'Chaqueta vaquera', 'Vestido floral', 'Abrigo largo', 'Sudadera oversize', 'Falda midi']),
        'description' => fake()->randomElement(['Tejido 100% algodón', 'Corte moderno', 'Edición limitada', 'Material transpirable', 'Diseño exclusivo']),
        'price'       => fake()->randomFloat(2, 9.99, 199.99),
        'stock'       => fake()->numberBetween(0, 100),
        'size'        => fake()->randomElement(['XS', 'S', 'M', 'L', 'XL']),
        'color'       => fake()->randomElement(['Negro', 'Blanco', 'Azul', 'Rojo', 'Verde', 'Gris', 'Beige']),
        'category_id' => Category::factory(),
    ];
}
}
