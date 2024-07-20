<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{

    private $POKEMON_URL = "https://pokeapi.co/api/v2/pokemon";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemonData = Pokemon::paginate(100);
        return view('pokemon', [
            'pokemonData' => $pokemonData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pokeResponse = Http::get($this->POKEMON_URL . "/" . $id);
        $body = $pokeResponse->body();
        $deserialized = json_decode($body);
        return view("pokemon.details", [
            "pokemonData" => $deserialized
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Favourite/unfavourite pokemon
     */
    public function update(Request $request, string $id)
    {
        if ($request->session()->has($id)) {
            $request->session()->forget($id);
        } else {
            $request->session()->put($id, "fav");
        }
        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
