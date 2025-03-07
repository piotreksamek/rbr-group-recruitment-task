<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Security\LoginController;
use App\Http\Controllers\Security\RegisterController;


use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('app.home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login/store', [LoginController::class, 'login'])->name('app.security.login.store');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('app.security.showRegistrationForm');
Route::post('/register/store', [RegisterController::class, 'register'])->name('app.security.register.store');
