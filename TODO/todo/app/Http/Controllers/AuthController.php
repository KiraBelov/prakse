<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->route('todo');
        }

        return redirect()->route('login')->withErrors(['Invalid credentials']);
    }
}