<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/wedding-details/{id}', [FrontendController::class, 'weddingDetails']);
Route::get('/all-profile', [FrontendController::class, 'allProfile']);
Route::get('/profile/{slug}', [FrontendController::class, 'profileDetails']);
Route::get('/blogs', [FrontendController::class, 'blogs']);
Route::get('/blog-details/{id}', [FrontendController::class, 'blogDetails']);
Route::get('/contact', [FrontendController::class, 'contact']);

Route::middleware('guest:user')->group(function () {
    Route::get('/user/login', [AuthController::class, 'login'])->name('user.login');
    Route::post('/user/login-submit', [AuthController::class, 'login_submit'])->name('user.loginSubmit');
    Route::get('/user/register', [AuthController::class, 'register'])->name('user.register');
    Route::post('/user/register-submit', [AuthController::class, 'registerSubmit'])->name('user.registerSubmit');
});



Route::group(['prefix'=>'user', 'middleware' => ['user.auth', 'ensure.profile.updated']], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('profile-edit', [UserController::class, 'profileEdit'])->name('user.profileEdit');
    Route::post('profile-edit-submit', [UserController::class, 'profileEditSubmit'])->name('user.profileEdit.submit');
    Route::post('images/upload', [UserController::class, 'imageUpload'])->name('user.imageUpload');
    Route::post('/image/delete', [UserController::class, 'deleteImage'])->name('user.imageDelete');


    Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
});