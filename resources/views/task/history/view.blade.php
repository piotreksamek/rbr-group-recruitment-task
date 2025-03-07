@extends('app')

@section('page.title')
    {{ __('messages.task.history.title') }}
@endsection

@section('title')
    <h1 class="text-4xl font-bold mb-6">{{ __('messages.task.history.title') }}</h1>
@endsection

@section('content')
    <div class="grid grid-cols-2 gap-4">
        <div>
            <h3 class="font-semibold text-red-600">{{ __('messages.task.history.old_values') }}</h3>
            <ul class="p-2 bg-gray-100 rounded-md text-sm">
                @foreach(json_decode($history->old_value, true) ?? [] as $key => $value)
                    @if($key === 'status')
                        <li><strong>{{__('messages.task.create.form.' . $key) }}
                                :</strong> {{ __('messages.task.status.' . $value) }}</li>
                    @elseif($key === 'priority')
                        <li><strong>{{__('messages.task.create.form.' . $key) }}
                                :</strong> {{ __('messages.task.priority.' . $value) }}</li>
                    @else
                        <li><strong>{{__('messages.task.create.form.' . $key) }}:</strong> {{ $value }}</li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="font-semibold text-green-600">{{ __('messages.task.history.new_values') }}</h3>
            <ul class="p-2 bg-gray-100 rounded-md text-sm">
                @foreach(json_decode($history->new_value, true) ?? [] as $key => $value)
                    @if($key === 'status')
                        <li><strong>{{__('messages.task.create.form.' . $key) }}
                                :</strong> {{ __('messages.task.status.' . $value) }}</li>
                    @elseif($key === 'priority')
                        <li><strong>{{__('messages.task.create.form.' . $key) }}
                                :</strong> {{ __('messages.task.priority.' . $value) }}</li>
                    @else
                        <li><strong>{{__('messages.task.create.form.' . $key) }}:</strong> {{ $value }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mt-5">
        <a href="{{ route('app.task.history.list', $history->task_id) }}"
           class="w-full py-3 bg-slate-600 text-center text-white font-semibold rounded-md shadow-md hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-500">{{ __('messages.actions.back') }}</a>
    </div>
@endsection
