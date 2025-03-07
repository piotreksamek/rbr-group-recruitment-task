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
        'google_calendar_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function accessToken(): HasOne
    {
        return $this->hasOne(TaskAccessToken::class);
    }

    public function addHistory(array $oldData, array $newData): void
    {
        $latestVersion = $this->histories()->max('version') ?? 0;

        $history = new TaskHistory([
            'task_id' => $this->id,
            'version' => $latestVersion + 1,
            'old_value' => json_encode($oldData),
            'new_value' => json_encode($newData),
        ]);

        $history->save();
    }

    public function histories()
    {
        return $this->hasMany(TaskHistory::class);
    }
}
