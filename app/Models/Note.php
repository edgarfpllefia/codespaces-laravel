<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'mark',
        'student',
    ];

    //Aqui viene la novedad: notas es el hijo porque hay 1:N
    // En este caso notas es la N, muchos.
    //Entonces cual uso belongs to o has many

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
