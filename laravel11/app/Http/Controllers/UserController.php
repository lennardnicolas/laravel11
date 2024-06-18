<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(auth()->attempt(request()->only(['email', 'password']))) {
            return redirect('/home');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
}
