<!DOCTYPE html>
<html>
<head>
    <title>Deleted Posts</title>
</head>
<body>
    <h1>Deleted Posts</h1>

    @if(count($deletedPosts) > 0)
        <ul>
            @foreach($deletedPosts as $post)
                <li>
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->description }}</p>
                    <form method="post" action="{{ route('posts.restore', ['post' => $post->id]) }}">
                        @csrf
                        @method('put')
                        <button type="submit">Restore</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No deleted posts found.</p>
    @endif
</body>
</html>