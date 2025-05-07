<?php

namespace App\Traits;

use App\Exceptions\AlwaysFitException;

trait ApiException
{
    /**
     * Returna a bad request exception.
     */
    public function badRequestException(array|string $exception): void
    {
        throw new AlwaysFitException($exception, 400);
    }

    /**
     * Returna a unauthorized request exception.
     */
    public function unauthorizedRequestException(array|string $exception): void
    {
        throw new AlwaysFitException($exception, 401);
    }

    /**
     * Returna a pre condition failed exception.
     */
    public function preConditionFailedException(array|string $exception): void
    {
        throw new AlwaysFitException($exception, 412);
    }

    /**
     * Return a not found request exception.
     */
    public function notFoundRequestException(array|string $exception): void
    {
        throw new AlwaysFitException($exception, 404);
    }
}
