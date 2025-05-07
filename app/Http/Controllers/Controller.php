<?php

namespace App\Http\Controllers;

use App\Traits\ApiException;
use App\Traits\ApiResponse;


abstract class Controller
{
    use ApiException, ApiResponse;
}
