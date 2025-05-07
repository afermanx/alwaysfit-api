<?php

namespace App\Http\Controllers\ProgressLog;

use App\Models\Training;
use App\Models\ProgressLog;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ProgressLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
      $user = $request->user();

    $logs = $user->progressLogs()
        ->with('training')
        ->latest('completed_at')
        ->get();

    return response()->json([
        'data' => $logs
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Training $training): JsonResponse
    {
        $user = $request->user();

        $request->validate([
            'notes' => 'nullable|string|max:255',
        ]);

        $log = ProgressLog::create([
            'user_id' => $user->id,
            'training_id' => $training->id,
            'completed_at' => now(),
            'notes' => $request->notes,
        ]);

        return $this->ok([
            'message' => 'Treino registrado com sucesso!',
            'data' => $log,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
