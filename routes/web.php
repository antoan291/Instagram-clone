<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();


Route::post('follow/{user}',[App\Http\Controllers\FollowsController::class, 'store']) ;


Route::get('/',[App\Http\Controllers\PostsController::class, 'index']) ;

Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('p.show'); 
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);

Route::post('/p/comment', [App\Http\Controllers\CommentsController::class, 'store'])->name('p.create'); 
Route::post('like/{post}', [App\Http\Controllers\PostLikeController::class, 'store']);

Route::get('/search', [App\Http\Controllers\ProfilesController::class, 'search']);

Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

// Route::get('/search/', [App\Http\Controllers\ProfilesController::class, 'search'])->name('profile.search');








