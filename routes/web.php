<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::middleware('guest')->group(function () {
    // Login
   Route::get('/login', [SessionController::class, 'index'])->name('login');
   Route::post('/login', [SessionController::class, 'store'])->name('login.store');
   // Register
   Route::get('/register', [RegisteredUserController::class, 'index'])->name('register.index');
   Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
});
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{profile}', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/{profile}/picture', [ProfileController::class, 'picture'])->name('profile.picture');
    // Post
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
    Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::patch('/post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    // Comment
    Route::get('/comment', [CommentController::class, 'show'])->name('comment.show');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::patch('/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

});
