<?php

namespace App\Http\Controllers\Training;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Training\TrainingService;
use App\Http\Resources\Training\TrainingResource;
use App\Http\Requests\Training\TrainingIndexRequest;
use App\Http\Requests\Training\TrainingStoreRequest;
use App\Http\Requests\Training\TrainingUpdateRequest;
use App\Http\Resources\Training\TrainingResourceCollection;

class TrainingController extends Controller
{

    public function __construct(
        private TrainingService $trainingService,
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index(TrainingIndexRequest $request): JsonResponse
    {
        return $this->ok( new TrainingResourceCollection(resource: $this->trainingService->listAll($request->validated())));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainingStoreRequest $request): JsonResponse
    {
        return $this->ok( data: TrainingResource::make($this->trainingService->create($request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingStoreRequest $user)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainingUpdateRequest $request, Training $training)
    {
        return $this->ok( data: TrainingResource::make($this->trainingService->update($training, $request->validated())));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        $this->trainingService->delete($training);
    }
}
