<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request) {
        $credentials = $request->validated();

        if (Auth::attempt(['name' => $credentials['login'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'login' => 'Invalid login credentials'
        ])->onlyInput('login');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->intended('/');
    }

    public function index(Request $request) {
        return view('auth.login');
    }
}
