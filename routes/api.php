<?php
//En .php dirige el tráfico a traves de los endpoints y después realiza lo que se le pide.


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\isUserAuth;
use App\Http\Middleware\isAdmin;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Middleware con las rutas protegidas
Route::middleware([IsUserAuth::class])->group(function (){

        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'getUser']);

        Route::middleware([isAdmin::class])->group(function(){

            Route::post('/peliculas', [PeliculasController::class, 'store']);
            Route::put('/peliculas/{id}', [PeliculasController::class, 'update']);
            Route::delete('/peliculas/{id}', [PeliculasController::class, 'eliminar']);
            Route::post('/series', [SerieController::class, 'store']);
            Route::put('/series/{id}', [SerieController::class, 'update']);
            Route::delete('/series/{id}', [SerieController::class, 'eliminar']);
    });
});


//Rutas públicas

Route::get('/peliculas', [PeliculasController::class, 'index']);

//Esto llama
Route::get('/peliculas/{id}', [PeliculasController::class, 'show']);


Route::get('/series', [SerieController::class, 'index']);


//Esto llama
Route::get('/series/{id}', [SerieController::class, 'show']);


//Esta dos que tengo aquí son las públicas (Entrar sin token)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
