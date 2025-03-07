<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\TaskUpdated;
use App\Models\Task\Task;

class LogTaskHistory
{
    public function handle(TaskUpdated $event): void
    {
        $task = Task::findOrFail($event->task->id);
        $newTask = $event->task;
        $oldTask = $event->oldTask;;

        $oldData = [];
        $newData = [];

        foreach ($oldTask as $field => $oldValue) {
            $newValue = $newTask->{$field};

            if ($oldValue !== $newValue) {
                $oldData[$field] = $oldValue;
                $newData[$field] = $newValue;
            }
        }

        if (!empty($oldData)) {
            $task->addHistory($oldData, $newData);
        }
    }
}
