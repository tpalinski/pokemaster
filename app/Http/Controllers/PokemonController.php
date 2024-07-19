<?php

namespace App\Http\Controllers;

use App\Http\Resources\PokemonCollection;
use App\Http\Resources\PokemonDetails;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{

    private $POKEMON_URL = "https://pokeapi.co/api/v2/pokemon";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokeResponse = Http::get($this->POKEMON_URL, [
            "offset" => 0,
            "limit" => 100000,
        ]);
        // Could do some better error handling in the future
        $body = $pokeResponse->body();
        $collected = collect(json_decode($body)->results)->map(function($item, $key) {
            $item->id = basename($item->url);
            $item->url = null;
            return $item;
        });
        $page = request()->get('page');
        $perPage = 100;
        $paginator = new LengthAwarePaginator(
            $collected->forPage($page, $perPage), $collected->count(), $perPage, $page
        );
        $pokemon = PokemonCollection::make($paginator);
        return view('pokemon', [
            'pokemonData' => $pokemon
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
