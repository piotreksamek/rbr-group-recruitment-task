<div class="mb-6">
    <form method="GET" action="{{ route('app.tasks.index') }}" class="flex space-x-4">
        <div>
            <label for="priority"
                   class="block text-sm font-medium text-gray-700">{{ __('messages.task.list.table.priority') }}</label>
            <select name="priority" id="priority"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">{{ __('messages.task.filters.priority') }}</option>
                @foreach(\App\Enums\Priority::cases() as $priority)
                    <option value="{{ $priority->value }}" {{ request('priority') == $priority->value ? 'selected' : '' }}>{{ $priority->label() }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="status"
                   class="block text-sm font-medium text-gray-700">{{ __('messages.task.list.table.status') }}</label>
            <select name="status" id="status"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">{{ __('messages.task.filters.status') }}</option>
                @foreach(\App\Enums\Status::cases() as $statuses)
                    <option value="{{ $statuses->value }}" {{ request('status') == $statuses->value ? 'selected' : '' }}>{{ $statuses->label() }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="due_date"
                   class="block text-sm font-medium text-gray-700">{{ __('messages.task.list.table.due_date') }}</label>
            <input type="date" name="due_date" id="due_date"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                   value="{{ request('due_date') }}">
        </div>

        <div class="flex space-x-4">
            <button type="submit"
                    class="self-center py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                {{ __('messages.actions.filter') }}
            </button>

            <a href="{{ route('app.tasks.index') }}"
               class="self-center py-2 px-4 bg-gray-600 text-white font-semibold rounded-md shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                {{ __('messages.actions.delete_filters') }}
            </a>
        </div>
    </form>
</div>
