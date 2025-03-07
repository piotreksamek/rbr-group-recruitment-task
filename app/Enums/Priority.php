<?php

declare(strict_types=1);

namespace App\Enums;

enum Priority: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';

    public function label(): string
    {
        return match($this) {
            self::LOW => __('messages.task.priority.low'),
            self::MEDIUM => __('messages.task.priority.medium'),
            self::HIGH => __('messages.task.priority.high'),
        };
    }

    public static function getCalendarColor(string $priority): int
    {
        return match($priority) {
            self::LOW->value => 1,
            self::MEDIUM->value => 2,
            self::HIGH->value => 3,
        };
    }
}
