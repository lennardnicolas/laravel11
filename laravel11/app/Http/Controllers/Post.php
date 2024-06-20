<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post as PostModel;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Validator;

class Post extends Controller
{
    private PostModel $postModel;
    private UserModel $userModel;
    
    public function __construct() {
        $this->postModel = new PostModel();
        $this->userModel = new UserModel();
    }
    
    public function show()
    {
        $authenticatedUser = $this->userModel->getAuthUser();
        return view('post', [
            'user' => $authenticatedUser,
        ]);
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

        $author = $this->userModel->getAuthUser()->name;

        $this->postModel->createPost($data['title'], $data['description'], $file, $author);

        return redirect(route('admin'))->with('success', 'New post added');
    }

    public function delete($id) {
        $this->postModel->deletePostById($id);
        return redirect()->back()->with('success', 'Post deleted successfully');
    }

    public function showUpdate($id) {
        $post = $this->postModel->getById($id);
        $authenticatedUser = $this->userModel->getAuthUser();

        return view('updatepost', compact('post'), [
            'user' => $authenticatedUser,
        ]);
    }

    public function update(Request $request, $id)
    {
        $requestData = array_merge($request->all(), ['id' => $id]);

        $validatedData = Validator::make($requestData, [
            'id' => ['required'],
            'picture' => ['image', 'mimes:jpeg,png,jpg', 'max:10240'], // 10MB = 10240KB
            // Do not require title, description or image as they just dont get updated if fields are left empty
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

        return redirect(route('admin'))->with('success', 'Post updated successfully');
    }
}
