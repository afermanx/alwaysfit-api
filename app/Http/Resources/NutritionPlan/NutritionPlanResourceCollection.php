<?php

namespace App\Http\Resources\NutritionPlan;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\NutritionPlan\NutritionPlanResource;

class NutritionPlanResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $nutritionPlan = NutritionPlanResource::collection($this->collection);
        return [
            'data' => $nutritionPlan,
            'from' => $this->firstItem(),
            'last_page' => $this->lastPage(),
            'per_page' => $this->perPage(),
            'to' => $this->lastItem(),
            'total' => $this->total(),
            'current_page' => $this->currentPage(),
        ];
    }
}
