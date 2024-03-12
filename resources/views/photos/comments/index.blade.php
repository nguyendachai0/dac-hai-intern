<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments on Photo</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Assuming you're using Laravel Mix for CSS -->
</head>
<body>
<div class="container">
    <h1>Comments on "{{ $photo->name }}"</h1>
    <div>
        <img src="{{ asset('images/' . $photo->img) }}" alt="{{ $photo->title }}" style="max-width: 40px; height: auto;">
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="comments">
        @forelse ($comments as $comment)
            <div class="comment">
                <p>{{ $comment->content }}</p>
                <!-- Display comment's author if available -->
                @if(isset($comment->user))
                    <small>Posted by: {{ $comment->user->name }}</small>
                @endif
                <hr>
            </div>
        @empty
            <p>No comments yet.</p>
        @endforelse
    </div>
</div>
</body>
</html>
