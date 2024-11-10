<?php

use App\Http\Controllers\Api\FrontendController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [FrontendController::class, 'index']);

Route::post('/user/login', [AuthController::class, 'login']);