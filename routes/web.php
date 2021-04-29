<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UploadCkEditor;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

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

/** Threads Ressource Controller */

Route::get('/', [ThreadController::class, 'index'])->name('home');
Route::get('/blog', [ThreadController::class, 'index'])->name('threads.index');
Route::get('/blog/{channel}/{thread}', [ThreadController::class, 'show'])->name('threads.show');
Route::get('/blog/{channel}', [ChannelController::class, 'index'])->name('threads.show');

Route::get('/profiles/{user}', [ProfileController::class, 'show'])->name('profile.show');

/** Thread ressource Author */ 

Route::get('/admin/blog', [ThreadController::class, 'authorIndex'])->middleware(['auth'])->name('author.threads.index');
Route::get('/admin/blog/create', [ThreadController::class, 'create'])->middleware(['auth'])->name('threads.create');
Route::post('/admin/blog', [ThreadController::class, 'store'])->middleware(['auth'])->name('threads.store');
Route::delete('/blog/{channel}/{thread}', [ThreadController::class, 'destroy'])->middleware(['auth'])->name('threads.destroy');

Route::post('/blog/{channel}/{thread}/replies', [ReplyController::class, 'store'])->name('reply.store');



Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->post('/blog/{thread}/favorites', [FavoriteController::class, 'storeThread']);
Route::middleware(['auth'])->post('/blog/replies/{reply}/favorites', [FavoriteController::class, 'storeReply']);

/**  Upload Images For CKEditor */

Route::post('/upload', [UploadCkEditor::class, 'store'])->name('CKEditor.store');

require __DIR__.'/auth.php';
