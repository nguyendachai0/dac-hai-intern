<?php

use App\Http\Controllers\PhotoCommentController;
use Illuminate\Support\Facades\Route;

Route::resource('photos.comments', PhotoCommentController::class)->scoped([
    'comment' => 'slug',
]);
