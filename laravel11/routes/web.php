<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User as UserController;
use App\Http\Controllers\Home as HomeController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'showHome'])->name('home')->middleware('auth');
Route::get('/', [HomeController::class, 'basePage'])->name('basePage');