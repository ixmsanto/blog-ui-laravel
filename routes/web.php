<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
