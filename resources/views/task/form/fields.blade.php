<div class="mb-5">
    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('messages.task.create.form.name') }}</label>
    <input type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror {{ $readonly ? 'bg-gray-200 text-gray-500 cursor-not-allowed' : '' }}" id="name" name="name" value="{{ old('name', $task->name ?? '') }}" required {{ $readonly ? 'readonly' : '' }}>
    @error('name')
    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

<div class="mb-5">
    <label for="description" class="block text-sm font-medium text-gray-700">{{ __('messages.task.create.form.description') }}</label>
    <textarea class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('description') border-red-500 @enderror {{ $readonly ? 'bg-gray-200 text-gray-500 cursor-not-allowed' : '' }}" id="description" name="description" rows="4" {{ $readonly ? 'readonly' : '' }}>{{ old('description', $task->description ?? '') }}</textarea>
    @error('description')
    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

<div class="mb-5">
    <label for="priority" class="block text-sm font-medium text-gray-700">{{ __('messages.task.create.form.priority') }}</label>
    <select class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('priority') border-red-500 @enderror {{ $readonly ? 'bg-gray-200 text-gray-500 cursor-not-allowed' : '' }}" id="priority" name="priority" required {{ $readonly ? 'disabled' : '' }}>
        @foreach(\App\Enums\Priority::cases() as $priority)
            <option value="{{ $priority->value }}" {{ $priority->value === old('priority', $task->priority ?? '') ? 'selected' : '' }}>{{ $priority->label() }}</option>
        @endforeach
    </select>
    @error('priority')
    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

<div class="mb-5">
    <label for="status" class="block text-sm font-medium text-gray-700">{{ __('messages.task.create.form.status') }}</label>
    <select class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('status') border-red-500 @enderror {{ $readonly ? 'bg-gray-200 text-gray-500 cursor-not-allowed' : '' }}" id="status" name="status" required {{ $readonly ? 'disabled' : '' }}>
        @foreach(\App\Enums\Status::cases() as $status)
            <option value="{{ $status->value }}" {{ $status->value === old('status', $task->status ?? '') ? 'selected' : '' }}>{{ $status->label() }}</option>
        @endforeach
    </select>
    @error('status')
    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

<div class="mb-5">
    <label for="due_date" class="block text-sm font-medium text-gray-700">{{ __('messages.task.create.form.due_date') }}</label>
    <input type="date" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('due_date') border-red-500 @enderror {{ $readonly ? 'bg-gray-200 text-gray-500 cursor-not-allowed' : '' }}" id="due_date" name="due_date" value="{{ old('due_date', $task->due_date ?? '') }}" required {{ $readonly ? 'readonly' : '' }}>
    @error('due_date')
    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>
