<?php

use App\Console\Commands\SendEmailReminder;
use Illuminate\Support\Facades\Schedule;

Schedule::command(SendEmailReminder::class)->everyFifteenSeconds();
