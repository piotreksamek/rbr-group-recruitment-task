@extends('app')

@section('page.title')
    {{ __('messages.task.history.title') }}
@endsection

@section('title')
    <h1 class="text-4xl font-bold mb-6">{{ __('messages.task.history.title') }}</h1>
@endsection

@section('content')
    <div>
        <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-sm">
            <thead>
            <tr class="border-b">
                <th class="py-2 px-4 text-left">{{ __('messages.task.history.table.version') }}</th>
                <th class="py-2 px-4 text-left">{{ __('messages.task.history.table.show') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($histories as $history)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $history->version }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('app.task.history.view', [$history->task_id, $history->id]) }}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('messages.task.history.table.show') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        <a href="{{ route('app.task.view', $taskId) }}"
           class="w-full py-3 bg-slate-600 text-center text-white font-semibold rounded-md shadow-md hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500">{{ __('messages.actions.back') }}</a>
    </div>
@endsection
