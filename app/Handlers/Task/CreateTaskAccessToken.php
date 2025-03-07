<?php

declare(strict_types=1);

namespace App\Handlers\Task;

use App\Models\Task\Task;
use App\Models\Task\TaskAccessToken;
use Illuminate\Support\Str;

class CreateTaskAccessToken
{
    public function handle(Task $task): TaskAccessToken
    {
        return TaskAccessToken::create([
            'id' => Str::uuid()->toString(),
            'task_id' => $task->id,
            'access_token' => TaskAccessToken::generateToken(),
            'expires_at' => now()->addDay(),
        ]);
    }
}
