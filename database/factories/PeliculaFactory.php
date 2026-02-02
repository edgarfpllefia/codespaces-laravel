<?php

/*
Las factorias se utilizan para crear como una estructura predefinida al hacer una migración.
Si hago migración de peliculas, ya estará con estas 10 peliculas predefinidas.

*/

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PeliculaFactory extends Factory
{
    public function definition(): array
    {
        $peliculas = [
            ['nombre' => 'Inception', 'director' => 'Christopher Nolan', 'date' => 2010, 'duracion' => 148, 'genero' => 'Ciencia Ficción'],
            ['nombre' => 'El Padrino', 'director' => 'Francis Ford Coppola', 'date' => 1972, 'duracion' => 175, 'genero' => 'Drama'],
            ['nombre' => 'Pulp Fiction', 'director' => 'Quentin Tarantino', 'date' => 1994, 'duracion' => 154, 'genero' => 'Crimen'],
            ['nombre' => 'Matrix', 'director' => 'Lana Wachowski', 'date' => 1999, 'duracion' => 136, 'genero' => 'Ciencia Ficción'],
            ['nombre' => 'Interstellar', 'director' => 'Christopher Nolan', 'date' => 2014, 'duracion' => 169, 'genero' => 'Ciencia Ficción'],
            ['nombre' => 'Forrest Gump', 'director' => 'Robert Zemeckis', 'date' => 1994, 'duracion' => 142, 'genero' => 'Drama'],
            ['nombre' => 'El Caballero Oscuro', 'director' => 'Christopher Nolan', 'date' => 2008, 'duracion' => 152, 'genero' => 'Acción'],
            ['nombre' => 'Parasite', 'director' => 'Bong Joon-ho', 'date' => 2019, 'duracion' => 132, 'genero' => 'Thriller'],
            ['nombre' => 'Gladiator', 'director' => 'Ridley Scott', 'date' => 2000, 'duracion' => 155, 'genero' => 'Acción'],
            ['nombre' => 'El Señor de los Anillos', 'director' => 'Peter Jackson', 'date' => 2001, 'duracion' => 178, 'genero' => 'Fantasía'],
        ];

        static $index = 0;
        $pelicula = $peliculas[$index % count($peliculas)];
        $index++;

        return [
            'nombre' => $pelicula['nombre'],
            'director' => $pelicula['director'],
            'date' => $pelicula['date'],
            'duracion' => $pelicula['duracion'],
            'genero' => $pelicula['genero'],
            'img' => 'https://via.placeholder.com/300x450?text=' . urlencode($pelicula['nombre']),
        ];
    }
}
