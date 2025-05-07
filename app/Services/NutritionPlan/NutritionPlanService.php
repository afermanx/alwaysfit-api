<?php

namespace App\Services\NutritionPlan;

use App\Traits\ApiException;
use App\Models\NutritionPlan;
use Illuminate\Pagination\LengthAwarePaginator;

class NutritionPlanService
{
   use ApiException;

   /**
    * Get all nutrition plans
    * @param array $data
    * @return \Illuminate\Pagination\LengthAwarePaginator
    */
   public function listAll(array $data): LengthAwarePaginator
   {
    $userId = auth()->user()->id;
    $query = NutritionPlan::query();
    $query->where("user_id", $userId);
    return $query->paginate(10 ?? $data["perPage"]);
   }

   /**
    * Create nutrition plan
    * @param array $data
    * @return NutritionPlan
    */
   public function create(array $data): NutritionPlan
   {
        return NutritionPlan::create([
            ...$data,
            'user_id' => auth()->user()->id
        ]);
   }

    public function update(NutritionPlan $nutritionPlan, array $data): NutritionPlan
    {
        $nutritionPlan->update($data);
        return $nutritionPlan;
    }

    public function delete(NutritionPlan $nutritionPlan): void
    {
        $nutritionPlan->delete();
    }





}
