<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Add a Comment for photo: </h1>
    <img src="{{ asset('images/' . $photo->img) }}" alt="Photo" style="width:40px;">
    <form action="/photos/{{ $photo->id }}/comments" method="POST">
        @csrf 
        <div>
            <label for="content">Comment:</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <button type="submit">Submit Comment</button>
    </form>
</body>
</html>