<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
    </head>
    <body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        @foreach ($posts as $post)
            <div>
                <h2>Title : {{ $post->title }}</h2>
                <p>Description : {{ $post->description }}</p>
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" style="width: 400px;">
            </div>
            
            <form action="{{ route('postDelete', ['id' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <form action="{{ route('postUpdateView', ['id' => $post->id]) }}" method="GET">
                @csrf
                <button type="submit" style="margin-bottom: 100px;">Update</button>
            </form>
        @endforeach
    </body>
</html>