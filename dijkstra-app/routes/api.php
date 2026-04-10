<?php
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\GraphApiController;

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/shortest-path', [GraphApiController::class, 'calculate']);
    Route::post('/logout', [AuthApiController::class, 'logout']);
});