<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return response() -> json(['products' => $products],200);
    }


    public function show($id)
    {
         $product = Product::find($id);
        return response() -> json(['product' => $product],200);
    }


    public function store(Request $request)
    {
        $request->validate([
        'name'        => 'required|string|max:50',
        'description' => 'required|string|max:255',
        'price'       => 'required|numeric|min:0',
        'stock'       => 'required|integer|min:0',
        'size'        => 'required|string|max:10',
        'color'       => 'required|string|max:50',
        'category_id' => 'required|integer|exists:categories,id',
    ]);

    $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'size' => $request->size,
            'color' => $request->color,
            'category_id' => $request->category_id,
        ]);
        return response()->json(['message' => 'Producto creado exitosamente', 'product' => $product], 201);
    }


    public function update(Request $request, $id)
{
    $request->validate([
        'name'        => 'sometimes|string|max:50',
        'description' => 'sometimes|string|max:255',
        'price'       => 'sometimes|numeric|min:0',
        'stock'       => 'sometimes|integer|min:0',
        'size'        => 'sometimes|string|max:10',
        'color'       => 'sometimes|string|max:50',
        'category_id' => 'sometimes|integer|exists:categories,id',
    ]);

    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Producto no encontrado'], 404);
    }

    $product->update([
    'name'        => $request->name,
    'description' => $request->description,
    'price'       => $request->price,
    'stock'       => $request->stock,
    'size'        => $request->size,
    'color'       => $request->color,
    'category_id' => $request->category_id,
]);

    return response()->json(['message' => 'Producto actualizado correctamente', 'product' => $product], 200);
}


   public function destroy($id)
{
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['error' => 'Producto no encontrado'], 404);
    }

    $product->delete();
    return response()->json(['message' => 'Producto eliminado correctamente'], 200);
}

//CONSULTAS CRUZADAS

public function getByCategory($categoryId)
{
    $products = Product::with('category')
        ->where('category_id', $categoryId)
        ->get();

    if ($products->isEmpty()) {
        return response()->json(['error' => 'No se encontraron productos'], 404);
    }

    return response()->json(['products' => $products], 200);
}


}
