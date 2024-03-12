<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Photo Gallery</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <a href="{{ route('photos.create') }}">Upload New Photo</a>

    <div>
        @foreach ($photos as $photo)
            <div>
                @if($photo->img)
                <img src="{{ asset('images/' . $photo->img) }}" alt="{{ $photo->name }}" style="width: 100px; height: auto;">
            @endif

                <p>{{$photo->name}}</p>
                <p>Uploaded on: {{ $photo->created_at->format('Y-m-d') }}</p>
                <a href="{{ route('photos.edit', $photo->id) }}">Edit</a>
        
                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <!-- Add links for edit and delete if needed -->
            </div>
        @endforeach
    </div>
</body>
</html>