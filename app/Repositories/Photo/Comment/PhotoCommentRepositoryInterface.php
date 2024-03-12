<?php

namespace App\Repositories\Photo\Comment;

use App\Models\Comment;

interface PhotoCommentRepositoryInterface
{
    public function getByPhotoId($photoId);

    public function create($photoId, $content): Comment;

    public function getById($commentId): ?Comment;
}
