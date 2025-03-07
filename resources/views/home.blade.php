@extends('app')

@section('page.title')
    {{ __('messages.dashboard.title') }}
@endsection

@section('content')
    <div class="flex items-center justify-center text-center">
        @if(auth()->check())
            {{ __('messages.dashboard.hello') }} {{ auth()->user()->name }}
        @else
            {{ __('messages.dashboard.login') }}
        @endif
    </div>
@endsection
