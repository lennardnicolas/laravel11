<?php

namespace App\Http\Controllers;
use App\Models\Post as PostModel;

use Illuminate\Http\Request;

class Admin extends Controller
{
    private PostModel $postModel;
    
    public function __construct() {
        $this->postModel = new PostModel();
    }

    public function show()
    {
        $posts = $this->postModel->getAllPost();

        return view('admin', compact('posts'));
    }
}
