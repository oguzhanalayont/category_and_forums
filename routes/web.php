<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::resource('categories', CategoryController::class);
Route::get('/forums', [ForumController::class, 'index'])->name('forums.index');
Route::resource('forums', ForumController::class);
Route::resource('forums.posts', PostController::class);
Route::get('/forums/{forum}', [ForumController::class, 'show'])->name('forums.show');


