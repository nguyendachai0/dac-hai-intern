<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;


Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::put('/user/{id}', [UserController::class,  'update']);
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
