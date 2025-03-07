<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task\Task;
use App\Models\Task\TaskHistory;
use Illuminate\View\View;

class HistoryController extends Controller
{
    public function list(string $taskId): View
    {
        $histories = TaskHistory::where('task_id', $taskId)->orderBy('version', 'desc')->get();

        return view('task.history.index', compact('taskId','histories'));
    }

    public function view(string $taskId, string $historyId): View
    {
        $task = Task::findOrFail($taskId);
        $history = TaskHistory::findOrFail($historyId);

        $taskId = $task->id;

        return view('task.history.view', compact('taskId', 'history'));
    }
}
