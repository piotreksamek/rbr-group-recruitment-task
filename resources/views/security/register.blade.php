@extends('app')

@section('page.title')
    {{ __('messages.security.register.form.label') }}
@endsection
@section('title')
    <h1 class="text-4xl font-bold mb-6">{{ __('messages.security.register.form.label') }}</h1>
@endsection
@section('content')
    <form method="POST" action="{{ route('app.security.register.store') }}">
        @csrf
        <div class="mb-5">
            <label for="name"
                   class="block text-sm font-medium text-gray-700">{{ __('messages.security.register.form.name') }}</label>
            <input type="text"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror"
                   id="name" name="name" required>
            @error('name')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="email"
                   class="block text-sm font-medium text-gray-700">{{ __('messages.security.register.form.email') }}</label>
            <input type="email"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                   id="email" name="email" required>
            @error('email')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password"
                   class="block text-sm font-medium text-gray-700">{{ __('messages.security.register.form.password') }}</label>
            <input type="password"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror"
                   id="password" name="password" required>
            @error('password')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="password_confirmation"
                   class="block text-sm font-medium text-gray-700">{{ __('messages.security.register.form.confirm_password') }}</label>
            <input type="password"
                   class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('password_confirmation') border-red-500 @enderror"
                   id="password_confirmation" name="password_confirmation" required>
            @error('password_confirmation')
            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
                class="w-2/12 py-3 mt-4 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            {{ __('messages.security.register.form.label') }}
        </button>
    </form>
@endsection
