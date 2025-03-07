<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Filters\TaskFilter;
use App\Handlers\Task\CreateTaskAccessToken;
use App\Http\Controllers\Controller;
use App\Http\Request\Task\TaskRequest;
use App\Models\Task\Task;
use App\Models\Task\TaskAccessToken;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function __construct(
        private readonly TaskFilter $taskFilter,
        private readonly CreateTaskAccessToken $createTaskAccessToken,
    ) {
    }

    public function index(): View
    {
        $tasks = $this->taskFilter->applyFilters(Task::query())->get();

        return view('task.list', compact('tasks'));
    }

    public function create(): View
    {
        return view('task.create');
    }

    public function view(string $id): View
    {
        $task = Task::findOrFail($id);

        return view('task.view', compact('task'));
    }

    public function edit(string $id): View
    {
        $task = Task::findOrFail($id);

        return view('task.edit', compact('task'));
    }

    public function update(TaskRequest $request, string $id): RedirectResponse
    {
        $task = Task::findOrFail($id);

        $task->update($request->validated());

        return redirect()->route('app.tasks.index')->with('success', 'Zaktualizowano zadanie.');
    }

    public function destroy(string $id): RedirectResponse
    {
        Task::destroy($id);

        return redirect()->route('app.tasks.index')->with('success', 'Usunięto zadanie.');
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        Task::create($data);

        return redirect()->route('app.tasks.index')->with('success', 'Stworzono zadanie.');
    }

    public function generateAccess(Request $request): JsonResponse
    {
        $taskId = $request->json()->get('id');

        $task = Task::find($taskId);

        TaskAccessToken::where('task_id', $task->id)->delete();

        $token = $this->createTaskAccessToken->handle($task);

        return response()->json([
            'message' => 'Wygenerowano token.',
            'access_link' => url("/task/view/{$taskId}?access_token={$token->access_token}"),
            'expires_at' => $task->expires_at,
        ]);
    }
}
