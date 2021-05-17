<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UploadCkEditor;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FollowController;

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

// Route::get('/', [ThreadController::class, 'index'])->name('home');
Route::get('/blog', [ThreadController::class, 'index'])->name('threads.index');
Route::get('/blog/{channel:name}/{thread:slug}', [ThreadController::class, 'show'])->name('threads.show');
Route::get('/blog/{channel:name}', [ChannelController::class, 'index'])->name('threads.show');

Route::get('/profiles/{user:name}', [ProfileController::class, 'show'])->name('profile.show');

Route::get('/profiles/{user:name}/followers', [FollowController::class, 'index'])->name('follow.index');

Route::post('/blog/{channel:name}/{thread:slug}/replies', [ReplyController::class, 'store'])->name('reply.store');

/** Thread ressource Author */ 


Route::middleware('auth')->group(function(){

    Route::post('/profiles/{user:name}/follow', [FollowController::class, 'store'])->name('follow.store');
    Route::get('/admin/blog', [ThreadController::class, 'authorIndex'])->name('author.threads.index');
    Route::get('/admin/blog/create', [ThreadController::class, 'create'])->name('threads.create');
    Route::post('/admin/blog', [ThreadController::class, 'store'])->name('threads.store');
    Route::delete('/blog/{channel:name}/{thread:slug}', [ThreadController::class, 'destroy'])->name('threads.destroy');

    


    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::middleware(['auth'])->post('/blog/{thread:slug}/favorites', [FavoriteController::class, 'favoriteThread']);
    Route::middleware(['auth'])->post('/blog/replies/{reply}/favorites', [FavoriteController::class, 'favoriteReply']);

});
/**  Upload Images For CKEditor */

Route::post('/upload', [UploadCkEditor::class, 'store'])->name('CKEditor.store');

require __DIR__.'/auth.php';
