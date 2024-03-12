<?php

namespace App\Http\Controllers;

use App\Services\FileUploadService;
use App\Http\Requests\Photo\CreatePhotoRequest;
use App\Http\Requests\Photo\UpdatePhotoRequest;
use App\Repositories\Photo\PhotoRepositoryInterface;


class PhotoController extends Controller
{
    protected $photos;
    public function __construct(PhotoRepositoryInterface $photos)
    {
        $this->photos  = $photos;
    }
    public function index()
    {
        $photos = $this->photos->getAll();
        return view('photos.index', compact('photos'));
    }

    public function create()
    {
        return view('photos.create');
    }
    public function store(CreatePhotoRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName =  FileUploadService::upload($image, 'images');
        } else {
            return redirect()->back()->withErrors(['image' => 'No image file provided']);
        }
        $this->photos->create($validatedData, $imageName);
        return redirect()->route('photos.index')->with('success', 'Photo created successfully.');
    }
    public function show(string $id)
    {
        $photo = $this->photos->findById($id);
        return view('photos.show', compact('photo'));
    }
    public function edit(string $id)
    {
        $photo = $this->photos->findById($id);
        return view('photos.edit', compact('photo'));
    }
    public function update(UpdatePhotoRequest $request, string $id)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName =  FileUploadService::upload($image, 'images');
        } else {
            return redirect()->back()->withErrors(['image' => 'No image file provided']);
        }
        $this->photos->update($id,  $validatedData, $imageName);
        return redirect()->route('photos.index')->with('success', 'Photo updated successfully.');
    }

    public function destroy(string $id)
    {
        $this->photos->delete($id);
        return back()->with('success', 'Photo deleted successfully.');
    }
}
