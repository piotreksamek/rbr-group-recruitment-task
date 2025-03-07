<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\GoogleCalendar\GoogleCalendarController;

Route::post('task/generate/access/link', [TaskController::class, 'generateAccess']);

Route::post('/google/create/event', [GoogleCalendarController::class, 'createEvent']);
