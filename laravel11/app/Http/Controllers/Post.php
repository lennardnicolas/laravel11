<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post as PostModel;
use Illuminate\Support\Facades\Validator;

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

    public function showUpdate($id) {
        $post = $this->postModel->getById($id);
        return view('updatepost', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $requestData = array_merge($request->all(), ['id' => $id]);

        $validatedData = Validator::make($requestData, [
            'id' => ['required'],
            'picture' => ['image', 'mimes:jpeg,png,jpg', 'max:10240'], // 10MB = 10240KB
        ]);

        $data = request()->only(['title', 'description', 'picture']);
        $data['id'] = $id;
        
        if(isset($data['title'])) {
            $this->postModel->updateTitle($data['id'], $data['title']);
        }

        if(isset($data['description'])) {
            $this->postModel->updateDescription($data['id'], $data['description']);
        }

        if(isset($data['picture'])) {
            $file = $request->file('picture');
            $this->postModel->updatePicture($data['id'],  $file);
        }

        return redirect(route('admin'));
    }
}
