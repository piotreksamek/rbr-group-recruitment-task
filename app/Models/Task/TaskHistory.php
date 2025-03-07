<?php

declare(strict_types=1);

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskHistory extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'task_histories';

    protected $fillable = [
        'task_id',
        'version',
        'old_value',
        'new_value',
    ];

    protected $casts = [
        'old_value' => 'array',
        'new_value' => 'array',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
