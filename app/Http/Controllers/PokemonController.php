<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $isFavourite = false;
        if (Auth::user() != null) {
            $user = Auth::user();
            $isFavourite = $pokemon->users()->where('user_id', $user->id)->exists();
        }
        return view("pokemon.details", [
            "pokemonData" => $pokemon,
            "isFavourite" => $isFavourite,
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
        $user = Auth::id();
        $pokemon = Pokemon::where('apiId', $id)->firstOrFail();
        $isFavourite = User::find($user)->favourites()->where('pokemon_id', $pokemon->id)->exists();
        if ($isFavourite) {
            $pokemon->users()->detach($user);
        } else {
            $pokemon->users()->attach($user);
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
