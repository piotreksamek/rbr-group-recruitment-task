<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Task\Task;
use App\Models\Task\TaskAccessToken;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ViewTaskAccessMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $taskId = $request->route('id');

        $task = Task::find($taskId);

        if (!$task) {
            return redirect('/');
        }

        $accessToken = $task->accessToken;
        $accessTokenFromRequest = $request->query('access_token');
        $user = auth()->user();

        if ($user && $user->id === $task->user_id) {
            return $next($request);
        }

        if ($this->checkAccessToken($accessToken, $accessTokenFromRequest)) {
            return $next($request);
        }

        return redirect('/');
    }

    private function checkAccessToken(TaskAccessToken $accessToken, string $accessTokenFromRequest): bool
    {
        $accessTokenDate = Carbon::parse($accessToken->expires_at);
        $currentDate = Carbon::now();

        if ($accessToken
            && $accessToken->access_token === $accessTokenFromRequest
            && $accessTokenDate->gt($currentDate)) {
            return true;
        }

        return false;
    }
}
