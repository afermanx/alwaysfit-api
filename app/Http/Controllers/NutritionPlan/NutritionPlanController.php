<?php

namespace App\Http\Controllers\NutritionPlan;

use Illuminate\Http\Request;
use App\Models\NutritionPlan;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\NutritionPlan\NutritionPlanService;
use App\Http\Requests\NutritionPlan\NutritionUpdateRequest;
use App\Http\Resources\NutritionPlan\NutritionPlanResource;
use App\Http\Requests\NutritionPlan\NutritionPlanIndexRequest;
use App\Http\Requests\NutritionPlan\NutritionPlanStoreRequest;
use App\Http\Resources\NutritionPlan\NutritionPlanResourceCollection;

class NutritionPlanController extends Controller
{
    public function __construct(
        private NutritionPlanService $nutritionPlanService,
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(NutritionPlanIndexRequest $request): JsonResponse
    {
        return $this->ok(new NutritionPlanResourceCollection(resource: $this->nutritionPlanService->listAll($request->validated())));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NutritionPlanStoreRequest $request)
    {
        return $this->ok(data: NutritionPlanResource::make($this->nutritionPlanService->create($request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(NutritionPlan $nutritionPlan)
    {
        return $this->ok(NutritionPlanResource::make($nutritionPlan));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NutritionUpdateRequest $request, NutritionPlan $nutritionPlan): JsonResponse
    {
        return $this->ok(data: NutritionPlanResource::make($this->nutritionPlanService->update( $nutritionPlan, $request->validated(),)));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NutritionPlan $nutritionPlan)
    {
        $this->nutritionPlanService->delete(nutritionPlan: $nutritionPlan);
    }
}
