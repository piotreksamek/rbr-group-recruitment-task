<?php

declare(strict_types=1);

namespace App\Filters;

use App\Enums\Priority;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TaskFilter
{
    private Builder $query;

    public function __construct(private readonly Request $request)
    {
    }

    public function applyFilters(Builder $query): Builder
    {
        $this->query = $query;

        $this->filterByUser()
            ->filterByPriority()
            ->filterByStatus()
            ->filterByDueDate();

        return $this->query;
    }

    private function filterByUser(): self
    {
        if (auth()->check()) {
            $this->query->where('user_id', auth()->id());
        }

        return $this;
    }
    private function filterByPriority(): self
    {
        if ($this->request->filled('priority') && Priority::tryFrom($this->request->priority)) {
            $this->query->where('priority', $this->request->priority);
        }

        return $this;
    }

    private function filterByStatus(): self
    {
        if ($this->request->filled('status') && Status::tryFrom($this->request->status)) {
            $this->query->where('status', $this->request->status);
        }

        return $this;
    }

    private function filterByDueDate(): self
    {
        if ($this->request->filled('due_date')) {
            $this->query->whereDate('due_date', $this->request->due_date);
        }

        return $this;
    }
}
