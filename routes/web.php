<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/wedding-details/{id}', [FrontendController::class, 'weddingDetails']);
Route::get('/contact', [FrontendController::class, 'contact']);

Route::get('/user/login', [AuthController::class, 'login'])->name('user.login');
Route::get('/user/register', [AuthController::class, 'register'])->name('user.register');