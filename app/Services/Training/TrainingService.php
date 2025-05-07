<?php

namespace App\Services\Training;


use App\Models\Training;
use App\Traits\ApiException;
use App\Training\TrainingLevel;
use Illuminate\Pagination\LengthAwarePaginator;

class TrainingService
{
    use ApiException;

    /**
     * List all trainings
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function listAll(array $data): LengthAwarePaginator
    {
        $userId = auth()->user()->id;
        $query = Training::query();
        $query->where("user_id", $userId);

        if(isset($data["level"]) && $data["level"] != null)
        {
            $query->where("level", $data["level"]);
        }
        return $query->paginate(10 ?? $data["perPage"]);
    }


    /**
     * Create Training
     * @param array $data
     * @return Training
     */
    public function create(array $data): Training
    {
        return Training::create([
                ...$data,
                'user_id' => auth()->user()->id,
                'level' =>  isset($data['level']) ? $data['level'] : TrainingLevel::BEGINNER
            ]);
    }

    /**
     * Update Training
     * @param \App\Models\Training $training
     * @param array $data
     * @return Training
     */
    public function update(Training $training, array $data): Training
    {
        $training->update($data);
        return $training;
    }

    public function delete(Training $training): void
    {
        $training->delete();
    }
}
