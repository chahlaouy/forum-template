<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ThreadController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UploadCkEditor;

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

Route::get('/threads', [ThreadController::class, 'index'])->name('threads.index');
Route::get('/threads/{channel}/{thread}', [ThreadController::class, 'show'])->name('threads.show');
Route::post('/threads', [ThreadController::class, 'store'])->name('threads.store');
Route::post('/threads/{channel}/{thread}/replies', [ReplyController::class, 'store'])->name('reply.store');
Route::get('/threads/{channel}', [ChannelController::class, 'index'])->name('threads.show');


/**  Upload Images For CKEditor */

Route::post('/upload', [UploadCkEditor::class, 'store'])->name('CKEditor.store');

Route::get('/dashboard', function () { return view('admin.dashboard'); })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
