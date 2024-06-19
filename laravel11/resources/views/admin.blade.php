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
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" style="width: 400px;">
            </div>
            
            <form action="{{ route('postDelete', ['id' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" style="margin-bottom: 100px;">Delete</button>
            </form>
        @endforeach
    </body>
</html>