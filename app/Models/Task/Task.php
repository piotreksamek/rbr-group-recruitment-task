<?php

declare(strict_types=1);

namespace App\Models\Task;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'description',
        'priority',
        'status',
        'due_date',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function accessToken(): HasOne
    {
        return $this->hasOne(TaskAccessToken::class);
    }
}
