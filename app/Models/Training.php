<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProgressLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Training extends Model
{

    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'level',
    ];

    /**
     * Get the user that owns the Training
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Training>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the progressLogs for the Training
     * @return HasMany<ProgressLog, Training>
     */
    public function progressLogs(): HasMany
    {
        return $this->hasMany(ProgressLog::class);
    }

}
