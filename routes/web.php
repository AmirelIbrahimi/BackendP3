<?php

use App\Http\Controllers\ContactController;
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

// Contact Routes
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show'); // Contact formulier tonen
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit'); // Formulier verzenden

// Post Routes (alleen voor ingelogde gebruikers)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/create-post', [PostController::class, 'createPost']);
    Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
    Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
    Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
    Route::get('/admin/contact-messages', [ContactController::class, 'index'])->name('contact.index');
});

