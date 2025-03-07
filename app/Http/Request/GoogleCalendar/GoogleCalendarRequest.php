<?php

declare(strict_types=1);

namespace App\Http\Request\GoogleCalendar;

use Illuminate\Foundation\Http\FormRequest;

class GoogleCalendarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'google_calendar_id' => 'required|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
