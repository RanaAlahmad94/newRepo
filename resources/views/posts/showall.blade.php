<!DOCTYPE html>
<html>
<head>
    <title>All Posts</title>
</head>
<body>
    <h1>All Posts</h1>
    
    @if(count($posts) > 0)
        <ul>
            @foreach($posts as $post)
                <li>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->description }}</p>
<!-- Delete button -->
<form method="post" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
    @csrf
    @method('delete')
    <button type="submit">Delete</button>
</form>

                    <form method="GET" action="{{ route('posts.edit', ['post' => $post->id]) }}">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No posts found.</p>
    @endif
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a><br>
    <a href="{{ route('posts.deletedPosts') }}" class="btn btn-primary">Restore Deleted Posts</a>

</body>
</html>