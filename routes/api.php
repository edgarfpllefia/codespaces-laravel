<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsUserAuth;
use App\Http\Middleware\IsAdmin;


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
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);

//RUTAS PUBLICAS CON CONSULTAS CRUZADAS

Route::get('/categories/{id}/products', [CategoryController::class, 'showWithProducts']);
Route::get('/products/category/{categoryId}', [ProductController::class, 'getByCategory']);
