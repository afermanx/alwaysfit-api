<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    User\UserController,
};


Route::prefix('v1')->group(function () {
   // Rota de boas-vindas
    Route::get('/', function () {
        return [
            'message' => 'Welcome!',
            'name' => config('app.name'),
            'version' => config('app.version'),
        ];
    });


        // Auth routes

            Route::prefix('users')->group(function () {
            Route::controller(UserController::class)->group(function () {
            Route::get('/profile','show');
            });
        });

});
