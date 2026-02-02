<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $table = 'peliculas';
    protected $fillable = ['nombre', 'director','date', 'duracion', 'genero', 'img' ];

    public $timestamps = false; // ← Añade esto
}
