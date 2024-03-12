<?php

namespace App\Http\Controllers;

use App\Http\Requests\Photo\Comment\CreatePhotoCommentRequest;

use App\Repositories\Photo\Comment\PhotoCommentRepositoryInterface;
use App\Repositories\Photo\PhotoRepositoryInterface;


class PhotoCommentController extends Controller
{
    protected $photoCommentRepository;
    protected $photoRepository;
    public function __construct(PhotoCommentRepositoryInterface $photoCommentRepositoryInterface, PhotoRepositoryInterface $photoRepository)
    {
        $this->photoRepository = $photoRepository;
        $this->photoCommentRepository = $photoCommentRepositoryInterface;
    }
    public function index($photoId)
    {
        $photo = $this->photoRepository->findById($photoId);
        $comments = $this->photoCommentRepository->getByPhotoId($photoId);
        return view('photos.comments.index', ['comments' => $comments, 'photo' => $photo]);
    }
    public function create($photoId)
    {

        $photo = $this->photoRepository->findById($photoId);

        return view('photos.comments.create', ['photo' => $photo]);
    }
    public function store(CreatePhotoCommentRequest $request, $photoId)
    {
        $validatedData = $request->validated();
        $photo = $this->photoRepository->findById($photoId);
        $this->photoCommentRepository->create($photoId, $validatedData['content']);

        return back()->with('success', 'Comment added successfully.');
    }
    public function show($photoId, $commentId)
    {
        $comment = $this->photoCommentRepository->getById($commentId);
        return view('photos.comments.show', ['comment' => $comment]);
    }
}
