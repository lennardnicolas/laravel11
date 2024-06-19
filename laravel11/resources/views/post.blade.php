<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create post</title>
    </head>
    <body>
        @if ($errors->any())
            <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <form action="{{ route('post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" required>
            </div>
            <div>
                <label for="picture">Picture:</label>
                <input type="file" id="picture" name="picture" accept="image/png, image/gif, image/jpeg" required>
            </div>
            <button type="submit">Post</button>
        </form>
    </body>
</html>