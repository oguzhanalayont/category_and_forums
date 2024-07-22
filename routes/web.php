<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Ana sayfa
Route::get('/', [CategoryController::class, 'index'])->name('home');

// Kategoriler için rotalar
Route::resource('categories', CategoryController::class);

// Forumlar için rotalar
Route::resource('forums', ForumController::class);

// Forumlar ile ilişkili Postlar için rotalar
Route::resource('forums.posts', PostController::class);

// Forum gösterim rotası (forum detayları)
Route::get('/forums/{forum}', [ForumController::class, 'show'])->name('forums.show');
