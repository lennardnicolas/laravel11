<div>
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->description }}</p>
    <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" style="width: 400px;">
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