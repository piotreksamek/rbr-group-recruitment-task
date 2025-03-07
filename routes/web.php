<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Security\LoginController;
use App\Http\Controllers\Security\RegisterController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\HistoryController;

Route::get('/', [HomeController::class, 'index'])->name('app.home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login/store', [LoginController::class, 'login'])->name('app.security.login.store');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('app.security.showRegistrationForm');
Route::post('/register/store', [RegisterController::class, 'register'])->name('app.security.register.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('app.tasks.index');
    Route::get('/task/create', [TaskController::class, 'create'])->name('app.task.create');
    Route::post('/task/create/store', [TaskController::class, 'store'])->name('app.task.create.store');
});

Route::middleware(['auth', 'taskOwner'])->group(function () {
    Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('app.task.edit');
    Route::put('/task/edit/{id}/store', [TaskController::class, 'update'])->name('app.task.edit.store');
    Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('app.task.destroy');
    Route::get('/task/history/{id}', [HistoryController::class, 'list'])->name('app.task.history.list');
    Route::get('/task/history/{id}/{historyId}', [HistoryController::class, 'view'])->name('app.task.history.view');
});
Route::get('/task/view/{id}', [TaskController::class, 'view'])->name('app.task.view')->middleware('viewTaskAccess');
