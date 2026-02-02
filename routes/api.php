<?php
//En .php dirige el tráfico a traves de los endpoints y después realiza lo que se le pide.


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/peliculas', [StudentController::class, 'index']);

Route::post('/peliculas', [StudentController::class, 'store']);
Route::put('/peliculas/{id}', [StudentController::class, 'update']);
Route::delete('/peliculas/{id}', [StudentController::class, 'eliminar']);
//Esto llama
Route::get('/peliculas/{id}', [StudentController::class, 'show']);
