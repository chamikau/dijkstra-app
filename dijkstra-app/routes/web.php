<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GraphController;

Route::get('/', function () {
    return view('login'); 
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/home', [GraphController::class, 'index'])->middleware('auth');
Route::post('/shortest-path', [GraphController::class, 'calculate'])->middleware('auth');