<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
    </head>
    <body>
        Welcome {{ $user->role }}

        @foreach ($posts as $post)
            <div>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" style="margin-bottom: 100px; width: 400px;">
            </div>
        @endforeach
    </body>
</html>