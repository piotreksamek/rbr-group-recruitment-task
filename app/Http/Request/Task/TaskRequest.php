<?php

declare(strict_types=1);

namespace App\Http\Request\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to_do,in_progress,done',
            'due_date' => 'required|date|after:today',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
