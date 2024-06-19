<?php

namespace App\Http\Controllers;
use App\Models\User as UserModel;
use App\Models\Post as PostModel;

use Illuminate\Http\Request;

class Home extends Controller
{
    private UserModel $userModel;
    private PostModel $postModel;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->postModel = new PostModel();
    }

    public function show()
    {
        $authenticatedUser = $this->userModel->getAuthUser();
        $posts = $this->postModel->getAllPost();

        return view('home', [
            'user' => $authenticatedUser,
            'posts' => $posts
        ]);
    }

    public function basePage() {
        return redirect(route('home'));
    }
}
