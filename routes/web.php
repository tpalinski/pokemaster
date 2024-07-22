<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('/', PokemonController::class)
    ->only(["index"]);

Route::resource('/pokemon', PokemonController::class)
    ->only(["show"]);

Route::resource('/pokemon', PokemonController::class)
    ->only(["update"])
    ->middleware(["auth"]);

Route::get('/favourites', [UserController::class, 'index'])
    ->middleware(['auth']);



// Authentication routes
Route::post('/auth/login', [LoginController::class, 'authenticate']);
Route::get('/login', [LoginController::class, 'index'])->name("login");

Route::post('/auth/register', [RegisterController::class, 'register']);
Route::get('/register', [RegisterController::class, 'index']);

Route::get('/auth/logout', [LoginController::class, 'logout'])
    ->middleware(['auth']);
