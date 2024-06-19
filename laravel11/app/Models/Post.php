<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
