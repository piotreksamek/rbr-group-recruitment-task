<?php

declare(strict_types=1);

namespace App\Enums;

enum Status: string
{
    case TODO = 'to_do';
    case IN_PROGRESS = 'in_progress';
    case DONE = 'done';

    public function label(): string
    {
        return match($this) {
            self::TODO => __('messages.task.status.to_do'),
            self::IN_PROGRESS => __('messages.task.status.in_progress'),
            self::DONE => __('messages.task.status.done'),
        };
    }
}
