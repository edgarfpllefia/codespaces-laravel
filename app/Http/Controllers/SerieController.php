<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;

class SerieController extends Controller
{
    //Ver todas las series
    public function index(){
        $series = Serie::all();
        return response()->json(['series' => $series], 200);
    }

    //Ver serie por id
    public function show($id){
        $serie = Serie::find($id);

        if (!$serie) {
            return response()->json(['error' => 'Serie no encontrada'], 404);
        }

        return response()->json(['serie' => $serie], 200);
    }

    //Eliminar serie por id
    public function eliminar($id){
        $serie = Serie::destroy($id);
        return response()->json(['mensaje' => 'Serie eliminada correctamente'], 200);
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:50',
            'creador' => 'required|string|max:50',
            'fecha_estreno' => 'required|integer|min:1900|max:2100',
            'temporadas' => 'required|integer|min:1',
            'genero' => 'required|string',
            'plataforma' => 'required|string',
            'img' => 'required|string',
        ]);

        $serie = Serie::create([
            'nombre' => $request->nombre,
            'creador' => $request->creador,
            'fecha_estreno' => $request->fecha_estreno,
            'temporadas' => $request->temporadas,
            'genero' => $request->genero,
            'plataforma' => $request->plataforma,
            'img' => $request->img,
        ]);

        return response()->json(['mensaje' => 'Serie creada correctamente', 'serie' => $serie], 201);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'creador' => 'sometimes|string',
            'fecha_estreno' => 'sometimes|integer|min:1900|max:2100',
            'temporadas' => 'sometimes|integer',
            'genero' => 'sometimes|string',
            'plataforma' => 'sometimes|string',
            'img' => 'sometimes|string',
        ]);

        $serie = Serie::find($id);

        if (!$serie) {
            return response()->json(['error' => 'Serie no encontrada'], 404);
        }

        $serie->update($request->all());

        return response()->json(['mensaje' => 'Serie actualizada correctamente', 'serie' => $serie], 200);
    }
}
