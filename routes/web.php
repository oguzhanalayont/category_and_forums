<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::resource('categories', CategoryController::class);
Route::resource('forums', ForumController::class);
// Route::group(['middleware' => ['auth']], function () {
Route::resource('forums.posts', PostController::class);
// });
