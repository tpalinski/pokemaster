<?php

namespace App\Http\Controllers;

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
        $pokeResponse = Http::get($this->POKEMON_URL, [
            "offset" => 0,
            "limit" => 100000,
        ]);
        // Could do some better error handling in the future
        $body = $pokeResponse->body();
        return view('pokemon');
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
        //
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
