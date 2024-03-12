<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class FileUploadService
{
    public static function upload(UploadedFile $file, string $directory)
    {
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $path =   $file->move(public_path($directory), $imageName);
        return $imageName;
    }
}
