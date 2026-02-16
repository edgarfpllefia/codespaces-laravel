<?php
//En .php dirige el tráfico a traves de los endpoints y después realiza lo que se le pide.


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\SerieController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/peliculas', [PeliculasController::class, 'index']);

Route::post('/peliculas', [PeliculasController::class, 'store']);
Route::put('/peliculas/{id}', [PeliculasController::class, 'update']);
Route::delete('/peliculas/{id}', [PeliculasController::class, 'eliminar']);
//Esto llama
Route::get('/peliculas/{id}', [PeliculasController::class, 'show']);


Route::get('/series', [SerieController::class, 'index']);

Route::post('/series', [SerieController::class, 'store']);
Route::put('/series/{id}', [SerieController::class, 'update']);
Route::delete('/series/{id}', [SerieController::class, 'eliminar']);
//Esto llama
Route::get('/series/{id}', [SerieController::class, 'show']);
