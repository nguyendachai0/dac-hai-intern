<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    <h1>Upload New Photo</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data">
        @csrf

       <input  type="text" name="name">
       <div>
        <label for="image">Image:</label>
        <input type="file" id="image" name="img">
    </div>
        <button type="submit">Create Photo</button>
    </form>
</body>
</html>