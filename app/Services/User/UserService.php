<?php

namespace App\Services\User;

use App\Models\User;
use App\User\UserStatus;
use App\Traits\ApiException;


class UserService
{
    use ApiException;

    public function create (array $data): User
    {
        return User::create([
            ...$data,
            'status' => UserStatus::ACTIVE
        ]);
    }
}
