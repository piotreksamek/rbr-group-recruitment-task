<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;

Route::post('task/generate/access/link', [TaskController::class, 'generateAccess']);
