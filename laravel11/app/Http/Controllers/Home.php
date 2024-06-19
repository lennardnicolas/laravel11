<?php

namespace App\Http\Controllers;
use App\Models\User as UserModel;

use Illuminate\Http\Request;

class Home extends Controller
{
    private UserModel $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function show()
    {
        return view('home', [
            'user' => $this->userModel->getAuthUser()
        ]);
    }

    public function basePage() {
        return redirect(route('home'));
    }
}
