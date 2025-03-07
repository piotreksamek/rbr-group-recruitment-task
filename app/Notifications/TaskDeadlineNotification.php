<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Models\Task\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskDeadlineNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Powiadomienie o zbliżającym się terminie zadania')
            ->view('emails.dead_line_mail', [
                'task' => $this->task,
                'user' => $notifiable,
            ])
            ->template('emails.dead_line_mail');
    }

    public function toArray($notifiable): array
    {
        return [
            'task_id' => $this->task->id,
        ];
    }
}
