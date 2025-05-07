<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    User\UserController,
};
use App\Http\Controllers\Auth\AuthController;


Route::prefix('v1')->group(function () {
   // Rota de boas-vindas
    Route::get('/', function () {
        return [
            'message' => 'Welcome!',
            'name' => config('app.name'),
            'version' => config('app.version'),
        ];
    });


    // Rotas Publicas
    Route::prefix('auth')->controller(AuthController::class)->group(function () {
        Route::post('/sign-in', 'signIn');
    });
    // Rotas Privadas
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('auth/logout', [AuthController::class, 'logout']);
        Route::prefix('users')->group(function () {
            Route::controller(UserController::class)->group(function () {
            Route::get('/profile','show');
            Route::post('/','store');
            });
        });
    });
});
