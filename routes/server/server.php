<?php

use App\Http\Controllers\ProvisionServer;
use Illuminate\Support\Facades\Route;

Route::get('server', ProvisionServer::class);
