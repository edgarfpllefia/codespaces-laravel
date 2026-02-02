<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series';
    protected $fillable = ['nombre', 'creador','fecha_estreno', 'temporadas', 'genero','plataforma', 'img' ];

    public $timestamps = false; // ← Añade esto
}
