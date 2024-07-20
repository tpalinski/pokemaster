<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;


Route::resource('/', PokemonController::class)
    ->only(["index"]);

Route::resource('/pokemon', PokemonController::class)
    ->only(["show", "update"]);
