<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>
    <body>
        Welcome {{ $user->name }}

        @foreach ($posts as $post)
            <div>
                <h2>Title : {{ $post->title }}</h2>
                <p>Description : {{ $post->description }}</p>
                <p>Published on : {{ $post->updated_at }}</p>
                <p>Author : {{ $post->author }}</p>
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" style="margin-bottom: 100px; width: 400px;">
            </div>
        @endforeach
    </body>
</html>