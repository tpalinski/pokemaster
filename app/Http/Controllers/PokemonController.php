<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $searchTerm = request('search');
        $pokemonData = Pokemon::where('name', 'LIKE', "%{$searchTerm}%")->paginate(100)->withQueryString();
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
        $pokemon = Pokemon::where('apiId', $id)->firstOrFail();
        return view("pokemon.details", [
            "pokemonData" => $pokemon
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
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
