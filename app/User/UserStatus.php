<?php

namespace App\User;

enum UserStatus :string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SUSPENDED = 'suspended';

    public function values(): array
    {
        return[
            self::ACTIVE,
            self::INACTIVE,
            self::SUSPENDED
        ];
    }
}
