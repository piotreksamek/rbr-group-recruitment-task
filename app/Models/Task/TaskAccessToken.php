<?php

declare(strict_types=1);

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskAccessToken extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'task_access_tokens';

    public $incrementing = false;

    protected $fillable = [
        'task_id',
        'access_token',
        'expires_at',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    protected $dates = [
        'expires_at',
    ];

    public static function generateToken(): string
    {
        return bin2hex(random_bytes(32));
    }
}
