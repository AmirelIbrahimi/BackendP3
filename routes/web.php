<?php

use App\Http\Controllers\PingController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/ping', [PingController::class, 'index']);
Route::get('/posts', [PingController::class, 'posts']);
Route::get('/posts/show', [PingController::class, 'show']);

