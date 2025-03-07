@extends('app')

@section('page.title')
    {{ __('messages.task.view.title') }}
@endsection

@section('title')
    <h1 class="text-4xl font-bold mb-6">{{ __('messages.task.view.title') }}</h1>
@endsection

@section('content')
    <form action="{{ route('app.task.edit', $task->id) }}" method="POST"
          class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        @csrf
        @method('PUT')

        @include('task.form.fields', ['readonly' => true])

        @if (auth()->user()?->id === $task->user_id)
            <div class="flex space-x-4">
                <a href="{{ route('app.task.edit', $task->id) }}"
                   class="text-center w-full py-3 mt-4 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ __('messages.actions.edit') }}</a>
                <a href="{{ route('app.tasks.index') }}"
                   class="w-full py-3 mt-4 bg-slate-600 text-center text-white font-semibold rounded-md shadow-md hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500">{{ __('messages.actions.back') }}</a>
            </div>
        @endif
    </form>
    @if (auth()->user()?->id === $task->user_id)
        <div class="flex gap-4 mt-4">
            <button data-task-id="{{ $task->id }}" type="button" id="generate-link"
                    class="w-1/2 py-3 bg-green-600 text-center text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                {{ __('messages.task.view.generate_access_link') }}
            </button>

            <a href="{{ route('app.task.history.list', $task->id) }}"
               class="w-1/2 text-center py-3 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                {{ __('messages.task.history.title') }}
            </a>

            <button data-task-id="{{ $task->id }}" type="button" id="add-to-calendar"
                    class="w-1/2 py-3 bg-green-600 text-center text-white font-semibold rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                {{ __('messages.google_calendar.add_to_calendar') }}
            </button>
        </div>

        <div id="access-link-container" class="mt-6 text-center hidden">
            <p>{{ __('messages.task.view.access_link') }}: <a id="access-link" target="_blank" class="text-blue-600"></a></p>
        </div>
    @endif
@endsection
@section('javascript')
    @vite(['resources/js/task/access-token.js'])
    @vite(['resources/js/task/google-calendar.js'])
@endsection
