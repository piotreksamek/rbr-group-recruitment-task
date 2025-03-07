@extends('app')

@section('page.title')
    {{ __('messages.task.update.title') }}
@endsection

@section('title')
    <h1 class="text-4xl font-bold mb-6">{{ __('messages.task.update.title') }}</h1>
@endsection

@section('content')
    <form action="{{ route('app.task.edit.store', $task->id) }}" method="POST"
          class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        @csrf
        @method('PUT')

        @include('task.form.fields', ['readonly' => false])

        <div class="flex space-x-4">
            <button type="submit"
                    class="w-full py-3 mt-4 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ __('messages.actions.update') }}</button>
            <a href="{{ route('app.tasks.index') }}"
               class="w-full py-3 mt-4 bg-slate-600 text-center text-white font-semibold rounded-md shadow-md hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500">{{ __('messages.actions.back') }}</a>
        </div>
    </form>
@endsection
