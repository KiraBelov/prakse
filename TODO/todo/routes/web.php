<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');



