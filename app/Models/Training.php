<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
