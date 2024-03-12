<?php

use App\Http\Controllers\InputController;
use Illuminate\Support\Facades\Route;

Route::get('input', [InputController::class, 'handleRequest']);
