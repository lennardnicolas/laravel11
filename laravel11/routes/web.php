<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login as LoginController;
use App\Http\Controllers\Logout as LogoutController;
use App\Http\Controllers\Register as RegisterController;
use App\Http\Controllers\Home as HomeController;
use App\Http\Controllers\Admin as AdminController;
use App\Http\Controllers\Post as PostController;
use App\Http\Middleware\CheckRole;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/post', [PostController::class, 'show'])->name('postForm')->middleware(CheckRole::class.':admin');;
Route::post('/post', [PostController::class, 'post'])->name('post')->middleware(CheckRole::class.':admin');
Route::delete('/post/{id}', [PostController::class, 'delete'])->name('postDelete')->middleware(CheckRole::class.':admin');

Route::get('/home', [HomeController::class, 'show'])->name('home')->middleware('auth');
Route::get('/', [HomeController::class, 'basePage'])->name('basePage');

Route::get('/admin', [AdminController::class, 'show'])->name('admin')->middleware(CheckRole::class.':admin');