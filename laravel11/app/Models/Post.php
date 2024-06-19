<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    
    public function createPost(string $title, string $description, $file) {
        $path = $file->store('pictures', 'public');

        $post = new Post();
        $post->title = $title;
        $post->description = $description;
        $post->image_path = $path;
        $post->created_at = now();
        $post->updated_at = now();
        $post->save();
    }

    public function getAllPost() {
        return Post::all();
    }

    public function deletePostById($id) {
        $post = Post::findOrFail($id);
        
        Storage::disk('public')->delete($post->image_path);
        
        $post->delete();
    }

    public function getById(string $id) {
        return  Post::findOrFail($id);
    }

    public function updateTitle($id, $newTitle) {
        $post = Post::findOrFail($id);
        $post->title = $newTitle;
        $post->save();
    }

    public function updateDescription($id, $newDescription) {
        $post = Post::findOrFail($id);
        $post->description = $newDescription;
        $post->save();
    }

    public function updatePicture($id, $file) {
        $post = Post::findOrFail($id);
        
        Storage::disk('public')->delete($post->image_path);
        
        $path = $file->store('pictures', 'public');
        
        $post->image_path = $path;
        
        $post->save();
    }
}
