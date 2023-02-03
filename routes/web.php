<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\commentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});
Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
Route::post('/posts/trashed/{post}/restore', [PostController::class, 'trashedRestore'])->name('posts.trashed.restore');
Route::post('/posts/trashed/{post}/force_delete', [PostController::class, 'trashedDelete'])->name('posts.trashed.destroy');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware(middleware:"auth");

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store']);

Route::post('/comments', [commentController::class, 'store'])->name('comments.store');;

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::PUT('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::DELETE('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
