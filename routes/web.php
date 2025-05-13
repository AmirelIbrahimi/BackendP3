<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::all();
    return view('home', ['posts' => $posts]);
});

// Auth Routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/contact', function () {
    return view('contact');
});

// Post Routes (alleen voor ingelogde gebruikers)
Route::post('/create-post', [PostController::class, 'createPost'])->middleware('auth');
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen'])->middleware('auth');
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost'])->middleware('auth');
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost'])->middleware('auth');
