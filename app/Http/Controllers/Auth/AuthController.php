<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInRequest;

class AuthController extends Controller
{
    public function __construct(private AuthService $service)
    {}

    public function signIn(SignInRequest $request): JsonResponse
    {
        return $this->ok($this->service->signIn($request->validated()));
    }
    Public function logout(Request $request): JsonResponse
    {
        $this->service->logout($request->user());
        return $this->noContent();
    }
}
