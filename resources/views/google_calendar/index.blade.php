@extends('app')

@section('page.title')
{{ __('messages.google_calendar.create.title') }}
@endsection

@section('title')
    <h1 class="text-4xl font-bold mb-6">{{ __('messages.google_calendar.create.title') }}</h1>
@endsection

@section('content')
        <form action="{{ route('app.google.calendar.store') }}" method="POST" class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
            @csrf

            <div class="mb-5">
                <label for="google_calendar_id" class="block text-sm font-medium text-gray-700">{{ __('messages.google_calendar.create.form.id') }}</label>
                <input type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('google_calendar_id') border-red-500 @enderror" id="google_calendar_id" name="google_calendar_id">
                @error('google_calendar_id')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-4">
                <button type="submit" class="w-full py-3 mt-4 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ __('messages.actions.save') }}</button>
                <a href="{{ route('app.home') }}" class="w-full py-3 mt-4 bg-slate-600 text-center text-white font-semibold rounded-md shadow-md hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500">{{ __('messages.actions.back') }}</a>
            </div>
        </form>
@endsection
