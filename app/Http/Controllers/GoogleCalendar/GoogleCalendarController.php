<?php

declare(strict_types=1);

namespace App\Http\Controllers\GoogleCalendar;

use App\Enums\Priority;
use App\Http\Controllers\Controller;
use App\Http\Request\GoogleCalendar\GoogleCalendarRequest;
use App\Models\Task\Task;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\GoogleCalendar\Event;

class GoogleCalendarController extends Controller
{
    public function addGoogleCalendarId(): View
    {
        return view('google_calendar.index');
    }

    public function store(GoogleCalendarRequest $request): RedirectResponse
    {
        $request->validated();

        $user = Auth::user();

        $user->google_calendar_id = $request->google_calendar_id;

        $user->save();

        return redirect('/')->with('success', 'Dodano kalendarz');
    }

    public function createEvent(Request $request)
    {
        $taskId = $request->json()->get('id');

        $task = Task::findOrFail($taskId);

        $taskDueDate = Carbon::parse($task->due_date);

        try {
            Event::create([
                'name' => $task->name,
                'description' => $task->description,
                'colorId' => Priority::getCalendarColor($task->priority),
                'startDateTime' => $taskDueDate->subMinute(),
                'endDateTime' => $taskDueDate,
            ],
                $task->user->google_calendar_id,
            );
        } catch (\Exception $exception) {
            $exception = json_decode($exception->getMessage(), true);

            if (array_key_exists('error', $exception)) {
                return response()->json(['error' => $exception['error']['error']], $exception['error']['code']);
            }
        }

        return response()->json([
            'message' => 'Pomyślnie dodano zadanie do kalendarza Google.',
        ]);
    }
}
