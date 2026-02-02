<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;

class PeliculasController extends Controller
{
    //Ver todas las peliculas
    public function index(){
        $peliculas = Pelicula::all();
        return response() -> json(['peliculas' => $peliculas],200);
    }

    //Ver películas por id
    public function show($id){
        $pelicula = Pelicula::find($id);

        return response() -> json(['pelicula' => $pelicula],200);
    }

    //Eliminar pelicula por id
    public function eliminar($id){
        $pelicula = Pelicula::destroy($id);
        return response()->json(['Pelicula eliminada correctamente'],200);
    }

    public function store(Request $request){

    $request->validate([
       'nombre' => 'required|string|max:50',
        'director' => 'required|string|max:50',
        'date' => 'required|integer|min:1900|max:2100',
        'duracion' => 'required|integer|min:1',
        'genero' => 'required|string',
        'img' => 'required|string',
    ]);

    $pelicula = Pelicula::create([
            'nombre' => $request->nombre,
            'director' => $request->director,
            'date' => $request->date,
            'duracion' => $request->duracion,
            'genero' => $request->genero,
            'img' =>$request->img,
        ]);
        return response()->json(['Pelicula creada correctamente' => $pelicula], 201);
    }

    public function update(Request $request, $id){

    $request->validate([
        'nombre' => 'sometimes|string|max:255',
        'director' => 'sometimes|string',
        'date' => 'sometimes|integer|min:1900|max:2100',
        'duracion' => 'sometimes|integer',
        'genero' => 'sometimes|string',
        'img' => 'sometimes|string',
    ]);

    $pelicula = Pelicula::find($id);

    if (!$pelicula) {
    return response()->json(['error' => 'Película no encontrada'], 404);
}

    $pelicula->update([
        'nombre' => $request->nombre,
        'director' => $request->director,
        'date' => $request->date,
        'duracion' => $request->duracion,
        'genero' => $request->genero,
        'img' =>$request->img,
    ]);

    return response()->json(['Pelicula actualizada correctamente' => $pelicula],200);
    }


    }

