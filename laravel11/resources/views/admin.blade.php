<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
    </head>
    <body>
        @foreach ($posts as $post)
            <div>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" style="width: 400px; margin-bottom: 100px;">
            </div>
        @endforeach
    </body>
</html>