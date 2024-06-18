<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;

class User extends Controller
{
    private UserModel $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

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

        $data = request()->only(['email', 'password']);
        
        if($this->userModel->canLogin($data['email'], $data['password'])) {
            return redirect('/home');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
}
