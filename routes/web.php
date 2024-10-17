<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/wedding-details/{id}', [FrontendController::class, 'weddingDetails']);
Route::get('/contact', [FrontendController::class, 'contact']);

Route::middleware('guest:user')->group(function () {
    Route::get('/user/login', [AuthController::class, 'login'])->name('user.login');
    Route::post('/user/login-submit', [AuthController::class, 'login_submit'])->name('user.loginSubmit');
    Route::get('/user/register', [AuthController::class, 'register'])->name('user.register');
    Route::post('/user/register-submit', [AuthController::class, 'registerSubmit'])->name('user.registerSubmit');
});



Route::group(['middleware' => ['user.auth']], function () {
    Route::get('user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('user/profile-edit', [UserController::class, 'profileEdit'])->name('user.profileEdit');
    Route::get('user/logout', [AuthController::class, 'logout'])->name('user.logout');
});