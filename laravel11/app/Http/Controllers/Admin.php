<?php

namespace App\Http\Controllers;
use App\Models\Post as PostModel;
use App\Models\User as UserModel;

use Illuminate\Http\Request;

class Admin extends Controller
{
    private PostModel $postModel;
    private UserModel $userModel;
    
    public function __construct() {
        $this->postModel = new PostModel();
        $this->userModel = new UserModel();
    }

    public function show()
    {
        $posts = $this->postModel->getAllPost();
        $authenticatedUser = $this->userModel->getAuthUser();

        return view('admin', compact('posts'), ['user' => $authenticatedUser]);
    }
}
