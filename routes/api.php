<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\IsUserAuth;
use App\Http\Middleware\IsAdmin;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//RUTAS PRIVADAS PROTEGIDAS POR MIDDLEWARE ISUSERAUTH Y ISADMIN

Route::middleware([IsUserAuth::class])->group(function (){

        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'getUser']);

        Route::middleware([IsAdmin::class])->group(function(){

            Route::post('/products', [ProductController::class, 'store']);
            Route::put('products/{id}', [ProductController::class, 'update']);
            Route::delete('products/{id}', [ProductController::class, 'destroy']);
            Route::post('/categories', [CategoryController::class, 'store']);
            Route::put('/categories/{id}', [CategoryController::class, 'update']);
            Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
    });
});


// RUTAS PUBLICAS
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProducController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);

//RUTAS PUBLICAS CON CONSULTAS CRUZADAS

Route::get('/categories/{id}/products', [CategoryController::class, 'showWithProducts']);
Route::get('/products/category/{categoryId}', [ProductController::class, 'getByCategory']);
