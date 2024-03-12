<?php

use App\Http\Controllers\ClosureMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('closuremiddleware', [ClosureMiddleware::class, 'index']);
