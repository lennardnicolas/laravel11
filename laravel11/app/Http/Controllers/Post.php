<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post as PostModel;

class Post extends Controller
{
    private PostModel $postModel;
    
    public function __construct() {
        $this->postModel = new PostModel();
    }
    
    public function show()
    {
        return view('post');
    }

    public function post(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'picture' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10240'], // 10MB = 10240KB
        ]);

        $data = request()->only(['title', 'description', 'picture']);

        $file = $request->file('picture');

        $this->postModel->createPost($data['title'], $data['description'], $file);

        return redirect(route('admin'));
    }

    public function delete($id) {
        $this->postModel->deletePostById($id);
        return redirect()->back()->with('success', 'Post deleted successfully');
    }
}
