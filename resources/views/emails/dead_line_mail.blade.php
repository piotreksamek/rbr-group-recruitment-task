<p>{{ __('emails.dead_line_email.first_line') }} {{ $user->name }},</p>

<p>{{ __('emails.dead_line_email.second_line', [ 'task_name' => $task->name ]) }}</p>
