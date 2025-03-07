<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Task\Task;
use App\Notifications\TaskDeadlineNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendEmailReminder extends Command
{
    protected $signature = 'task:send-reminder';

    protected $description = 'Wysyła przypomnienie e-mail o nadchodzących zadaniach';

    public function handle(): void
    {
        $tasks = Task::whereDate('due_date', Carbon::tomorrow())->get();

        foreach ($tasks as $task) {
            $task->user->notify(new TaskDeadlineNotification($task));
        }

        $this->info('Powiadomienia zostały wysłane.');
    }
}
