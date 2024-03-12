<?php

namespace App\Repositories\Photo;

interface PhotoRepositoryInterface
{
    public function getAll();
    public function findById(string $id);
    public function create(array $data, $imageName);
    public  function update(string $id, array $data, $imageName);
    public function delete(string $id);
}
