@extends('app')

@section('page.title')
    {{ __('messages.task.list.title') }}
@endsection

@section('title')
    <div class="flex justify-between items-center">
        <h1 class="text-4xl font-bold mb-6">{{ __('messages.task.list.title') }}</h1>
        <a href="{{ route('app.task.create') }}"
           class="p-2 mb-5 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            {{ __('messages.task.list.add') }}
        </a>
    </div>
@endsection

@section('content')
    @include('task.filter.filter')

    <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-sm">
        <thead>
        <tr class="border-b">
            <th class="py-2 px-4 text-left">{{ __('messages.task.list.table.name') }}</th>
            <th class="py-2 px-4 text-left">{{ __('messages.task.list.table.priority') }}</th>
            <th class="py-2 px-4 text-left">{{ __('messages.task.list.table.status') }}</th>
            <th class="py-2 px-4 text-left">{{ __('messages.task.list.table.due_date') }}</th>
            <th class="py-2 px-4 text-left">{{ __('messages.task.list.table.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">{{ $task->name }}</td>
                <td class="py-2 px-4">{{ __('messages.task.priority.' . $task->priority) }}</td>
                <td class="py-2 px-4">{{ __('messages.task.status.' .$task->status) }}</td>
                <td class="py-2 px-4">{{ $task->due_date }}</td>
                <td class="py-2 px-4 flex space-x-2">
                    <a href="{{ route('app.task.view', $task->id) }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('messages.actions.view') }}</a>

                    <a href="{{ route('app.task.edit', $task->id) }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('messages.actions.update') }}</a>

                    <form action="{{ route('app.task.destroy', $task->id) }}" method="POST"
                          onsubmit="return confirm('Czy na pewno chcesz usunąć to zadanie?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('messages.actions.delete') }}
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
