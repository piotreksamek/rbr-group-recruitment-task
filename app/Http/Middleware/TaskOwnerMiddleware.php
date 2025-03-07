<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Task\Task;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TaskOwnerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $taskId = $request->route('id');

        $task = Task::find($taskId);

        if (!$task) {
            return redirect('/');
        }

        if ($task->user_id !== Auth::id()) {
            return redirect('/');
        }

        return $next($request);
    }
}
