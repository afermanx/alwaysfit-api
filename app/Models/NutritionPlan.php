<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NutritionPlan extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'user_id',
    'title',
    'description',
  ];

   /**
    * Get the user that owns the NutritionPlan
    * @return BelongsTo<User, NutritionPlan>
    */
   public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
