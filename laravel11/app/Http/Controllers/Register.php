<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as UserModel;

class Register extends Controller
{
    private UserModel $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function show()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $data = request()->only(['name', 'email', 'password']);
        
        if(!$this->userModel->userExist($data['email'])) {
            $this->userModel->createUser($data['name'], $data['email'], $data['password']);
            
            return redirect(route('login'))->with('success', 'New member account created, you can now login');
        }

        return redirect()->back()->withErrors(['email' => 'Email alredy exist']);
    }
}
