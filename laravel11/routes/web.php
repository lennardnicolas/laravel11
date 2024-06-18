<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
