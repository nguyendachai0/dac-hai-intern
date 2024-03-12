<?php

namespace App\Repositories\Photo;

use App\Models\Photo;

class EloquentPhotoRepository implements PhotoRepositoryInterface
{
    public  function getAll()
    {
        return Photo::all();
    }
    public function findById(string $id)
    {
        return Photo::withTrashed()->findOrFail($id);
    }
    public function create(array $data, $imageName)
    {
        $photo = new Photo();
        $photo->name = $data['name'];
        $photo->img = $imageName;
        $photo->save();
        return $photo;
    }
    public function update(string $id, array $data, $imageName)
    {
        $photo = $this->findById($id);
        $photo->name = $data['name'];
        $photo->img = $imageName;
        $photo->save();
        return $photo;
    }
    public function delete(string $id)
    {
        $photo = $this->findById($id);
        $photo->delete();
    }
}
