<!-- resources/views/photos/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head contents same as create view -->
</head>
<body>
    <h1>Edit Photo</h1>

    <form method="POST" action="{{ route('photos.update', $photo->id) }}"  enctype="multipart/form-data" >
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $photo->name }}">
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="img">
        </div>
        <button type="submit">Update Photo</button>
    </form>
</body>
</html>
