<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\InvitationController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\MessageController;
use App\Http\Controllers\Frontend\SubscriptionController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/wedding-details/{id}', [FrontendController::class, 'weddingDetails']);
Route::get('/all-profile', [FrontendController::class, 'allProfile']);
Route::get('/profile/{slug}', [FrontendController::class, 'profileDetails']);
Route::get('/blogs', [FrontendController::class, 'blogs']);
Route::get('/blog-details/{id}', [FrontendController::class, 'blogDetails']);
Route::get('/plans', [FrontendController::class, 'plans']);
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
    Route::get('chat/list', [UserController::class, 'chatList'])->name('user.chat.list');
    Route::get('plan', [UserController::class, 'userPlan'])->name('user.plan');
    Route::get('setting', [UserController::class, 'setting'])->name('user.setting');

    Route::get('invitations', [InvitationController::class, 'invitations'])->name('user.invitations');
    Route::post('send-invitation', [InvitationController::class, 'sendInvitation'])->name('send.invitation');
    Route::post('cancel-invitation', [InvitationController::class, 'cancelInvitation'])->name('cancel.invitation');
    Route::post('accept-invitation', [InvitationController::class, 'acceptInvitation'])->name('accept.invitation');
    Route::post('deny-invitation', [InvitationController::class, 'denyInvitation'])->name('deny.invitation');

    Route::post('profile/{userId}/like', [UserController::class, 'like'])->name('profile.like');

    
    Route::post('chat-now', [MessageController::class, 'chatNow'])->name('user.chatnow');
    Route::post('chat-send', [MessageController::class, 'sendMessage'])->name('user.chat.send');
    Route::get('chat/messages', [MessageController::class, 'getMessages'])->name('chat.getMessages');

    Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('user.subscribe');

    

    Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
});