<?php

namespace App\Repositories\Photo\Comment;

use App\Models\Comment;


class EloquentPhotoCommentRepository implements PhotoCommentRepositoryInterface
{
    public function getByPhotoId($photoId)
    {
        return Comment::where('photo_id', $photoId)->get();
    }

    public function create($photoId, $content): Comment
    {
        $comment = new Comment();
        $comment->photo_id = $photoId;
        $comment->content = $content;
        $comment->save();
        return $comment;
    }

    public function getById($commentId): ?Comment
    {
        return Comment::find($commentId);
    }
}
