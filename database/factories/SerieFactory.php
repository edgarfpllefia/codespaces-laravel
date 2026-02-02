<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Serie;

/**
 * Factory para generar series de prueba
 * Crea datos realistas de series populares para testing y desarrollo
 */
class SerieFactory extends Factory
{
    // Especificar el modelo asociado
    protected $model = Serie::class;

    /**
     * Define la estructura de datos que tendrá cada serie generada
     * Se ejecuta automáticamente cada vez que llamamos a Serie::factory()->create()
     */
    public function definition(): array
    {
        // Array con 10 series reales predefinidas
        $series = [
            ['nombre' => 'Breaking Bad', 'creador' => 'Vince Gilligan', 'fecha_estreno' => 2008, 'temporadas' => 5, 'genero' => 'Drama', 'plataforma' => 'Netflix'],
            ['nombre' => 'Game of Thrones', 'creador' => 'David Benioff', 'fecha_estreno' => 2011, 'temporadas' => 8, 'genero' => 'Fantasía', 'plataforma' => 'HBO'],
            ['nombre' => 'Stranger Things', 'creador' => 'Duffer Brothers', 'fecha_estreno' => 2016, 'temporadas' => 4, 'genero' => 'Ciencia Ficción', 'plataforma' => 'Netflix'],
            ['nombre' => 'The Crown', 'creador' => 'Peter Morgan', 'fecha_estreno' => 2016, 'temporadas' => 6, 'genero' => 'Drama Histórico', 'plataforma' => 'Netflix'],
            ['nombre' => 'The Mandalorian', 'creador' => 'Jon Favreau', 'fecha_estreno' => 2019, 'temporadas' => 3, 'genero' => 'Ciencia Ficción', 'plataforma' => 'Disney+'],
            ['nombre' => 'The Office', 'creador' => 'Greg Daniels', 'fecha_estreno' => 2005, 'temporadas' => 9, 'genero' => 'Comedia', 'plataforma' => 'Netflix'],
            ['nombre' => 'Dark', 'creador' => 'Baran bo Odar', 'fecha_estreno' => 2017, 'temporadas' => 3, 'genero' => 'Thriller', 'plataforma' => 'Netflix'],
            ['nombre' => 'The Witcher', 'creador' => 'Lauren Schmidt', 'fecha_estreno' => 2019, 'temporadas' => 3, 'genero' => 'Fantasía', 'plataforma' => 'Netflix'],
            ['nombre' => 'Peaky Blinders', 'creador' => 'Steven Knight', 'fecha_estreno' => 2013, 'temporadas' => 6, 'genero' => 'Drama Criminal', 'plataforma' => 'Netflix'],
            ['nombre' => 'The Last of Us', 'creador' => 'Craig Mazin', 'fecha_estreno' => 2023, 'temporadas' => 1, 'genero' => 'Post-apocalíptico', 'plataforma' => 'HBO'],
        ];

        // Variable estática que mantiene su valor entre llamadas
        // Permite rotar entre las series del array
        static $index = 0;

        // Selecciona una serie usando el operador módulo (%)
        // Cuando $index llega a 10, vuelve a 0 (empieza de nuevo)
        $serie = $series[$index % count($series)];

        // Incrementa el índice para la siguiente serie
        $index++;

        // Devuelve los datos que se insertarán en la base de datos
        // Cada clave corresponde a una columna de la tabla 'series'
        return [
            'nombre' => $serie['nombre'],              // Ej: "Breaking Bad"
            'creador' => $serie['creador'],            // Ej: "Vince Gilligan"
            'fecha_estreno' => $serie['fecha_estreno'], // Ej: 2008
            'temporadas' => $serie['temporadas'],       // Ej: 5
            'genero' => $serie['genero'],              // Ej: "Drama"
            'plataforma' => $serie['plataforma'],      // Ej: "Netflix"

            // Genera una URL de imagen placeholder con el nombre de la serie
            // urlencode() convierte espacios y caracteres especiales para URLs
            // Ej: "https://via.placeholder.com/300x450?text=Breaking+Bad"
            'img' => 'https://via.placeholder.com/300x450?text=' . urlencode($serie['nombre']),
        ];
    }
}
