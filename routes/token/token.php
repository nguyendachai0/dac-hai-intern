<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('token', function (Request $request) {
    $token = $request->session()->token();
    $token = csrf_token();
    return $token;
});
