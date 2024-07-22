<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request) {
        $userData = $request->validated();
        $user = new User();
        $user->name = $userData['login'];
        $user->password = Hash::make($userData['password']);
        $user->save();

        Auth::login($user);

        return redirect()->intended('/');
    }

    public function index(Request $request) {
        return view('auth.register');
    }
}
