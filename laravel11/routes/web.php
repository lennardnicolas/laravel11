<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

Route::post('/api/login', [UserController::class, 'login'])->name('api-login');