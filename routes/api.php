<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/v1/auth')->group(function(){
    
    Route::post('/login', [AuthController::class, "funLogin"]);
    Route::post('/register', [AuthController::class, "funRegister"]);

    Route::middleware('auth:sanctum')->group(function(){
        Route::get('/profile', [AuthController::class, "funProfile"]);
        Route::post('/logout', [AuthController::class, "funLogout"]);

    });

});

Route::post('reset-password', [ResetPasswordController::class, "resetPassword"]);
Route::post('change-password', [ResetPasswordController::class, "changePassword"]);
