<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function showHome()
    {
        return view('home', [
            'user' => auth()->user()
        ]);
    }
}
