<?php

declare(strict_types=1);

namespace App\Events;

use App\DTO\Task\TaskDTO;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskUpdated
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public TaskDTO $task,
        public TaskDTO $oldTask
    ) {
    }
}
