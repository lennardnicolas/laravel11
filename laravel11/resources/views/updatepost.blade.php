<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="{{ asset('css/general.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
        @include('nav')
        <div class="content">
            <div>
                <div>
                    <h2>Title : {{ $post->title }}</h2>
                    <p>Description : {{ $post->description }}</p>
                    <p>Published on : {{ $post->updated_at }}</p>
                    <p>Author : {{ $post->author }}</p>
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" style="width: 400px; margin-bottom: 10px;">
                </div>
                <hr>
                
                <form action="{{ route('updatePost', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="title">New title</label>
                        <input type="text" id="title" name="title">
                    </div>
                    <div>
                        <label for="description">New description</label>
                        <input type="text" id="description" name="description">
                    </div>
                    <div>
                        <label for="picture">New picture:</label>
                        <input type="file" id="picture" name="picture" accept="image/png, image/gif, image/jpeg">
                    </div>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </body>
</html>