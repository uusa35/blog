<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('post', PostController::class)->only(['show', 'index','create','store','edit','update']);
Route::resource('comment', CommentController::class)->only(['store','edit','update'])->middleware('auth');
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('backend', DashBoardController::class)->only(['index']);
    Route::resource('comment', CommentController::class)->only(['index']);
});

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
