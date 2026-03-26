<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //VER TODAS LAS CATEGORIAS
    public function index()
    {
        $categories = Category::all();
        return response() -> json(['category' => $categories],200);
    }

    //VER CATEGORIAS POR ID
    public function show($id)
    {
         $category = Category::find($id);
        return response() -> json(['category' => $category],200);
    }

    //CREAR CATEGORIA
     public function store(Request $request){

    $request->validate([
        'name' => 'required|string|max:50',
        'description' => 'required|string|max:50',

    ]);

    $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return response()->json(['Categoria creada de forma exitosa!' => $category], 201);
    }



    //ACTUALIZAR CATEGORIA
    public function update(Request $request, $id){

    $request->validate([
        'name' => 'sometimes|string|max:255',
        'description' => 'sometimes|string',
    ]);

    $category = Category::find($id);

    if (!$category) {
    return response()->json(['error' => 'Categoria no encontrada'], 404);
}

    $category->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    return response()->json(['Categoria actualizada correctamente' => $category],200);
    }

    //Eliminar categoria por id
    public function destroy($id){

        $category = Category::find($id);

        //Miro antes si existe, si no existe envio 404.
        if(!$category){
            return response()->json(['error'=> 'Categoria no encontrada'], 404);
        }

        $category->delete();
        return response()->json(['message' => 'Categoria eliminada correctamente'], 200);
    }
}







