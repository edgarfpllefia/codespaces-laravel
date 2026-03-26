<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\isUserAuth;
use App\Http\Middleware\isAdmin;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


