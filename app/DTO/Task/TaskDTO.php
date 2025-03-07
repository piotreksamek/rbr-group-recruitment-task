<?php

declare(strict_types=1);

namespace App\DTO\Task;

use App\Enums\Priority;
use App\Enums\Status;

readonly class TaskDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $description,
        public Status $status,
        public Priority $priority,
        public string $due_date,
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            description: $data['description'],
            status: Status::from($data['status']),
            priority: Priority::from($data['priority']),
            due_date: $data['due_date'],
        );
    }
}
