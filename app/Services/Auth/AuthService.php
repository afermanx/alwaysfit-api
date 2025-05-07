<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Traits\ApiException;
use Illuminate\Support\Facades\Auth;

class AuthService
{
   use ApiException;

    public function signIn($data)
    {
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password'],
        ];

        if (!auth()->attempt($credentials)) {
            return $this->unauthorizedRequestException('Credenciais inválidas');
        }
        $token = Auth::user()->createToken('auth_token')->plainTextToken;

        return [
            'user' => Auth::user(),
            'token' => $token,
        ];
    }

    /**
     * User logout
     *
     * @param  User  $user
     * @return void
     */
    public function logout(User $user): void
    {
        if(! $user){
            $this->notFoundRequestException('Usuário não encontrado');
        }

        $user->tokens()->delete();
    }
}
