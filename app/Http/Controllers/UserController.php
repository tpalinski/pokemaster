<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request) {
        $userId = Auth::id();
        $user = User::find($userId);
        $favourites = $user->favourites()->paginate(100);
        return view('user.favourites', [
            'pokemonData' => $favourites
        ]);
    }
}
