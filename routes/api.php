<?php

use App\Http\Controllers\Api\FrontendController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [FrontendController::class, 'index']);

Route::post('/user/login', [AuthController::class, 'login']);
Route::post('/user/register', [AuthController::class, 'register']);


Route::middleware(['auth:api'])->prefix('user')->group(function () {
    Route::get('profile-edit', [UserController::class, 'profileEdit']);
    Route::post('profile-update', [UserController::class, 'profileUpdate']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::middleware('ensure.profile.updated')->group(function(){
        Route::get('dashboard', [UserController::class, 'dashboard']);
    });
});