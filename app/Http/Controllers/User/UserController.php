<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\UserCreateRequest;

class UserController extends Controller
{

    public function __construct(
        private UserService $userService,
    )
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request): JsonResponse
    {
        return $this->ok(UserResource::make($this->userService->create(data: $request->validated())));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): JsonResponse
    {
       if(!$user->trashed()) {
            return $this->notFoundRequestException('Usuário não encontrado');
        }
        return  $this->ok(UserResource::make($user)) ?? $this->badRequestException('Usuário não encontrado');
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
