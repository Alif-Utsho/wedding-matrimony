<?php

use App\Http\Controllers\Api\FrontendController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InvitationController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', [FrontendController::class, 'index']);
Route::get('/plans', [FrontendController::class, 'plans']);
Route::get('/all-profile', [FrontendController::class, 'allProfile']);
Route::get('/search-profile', [FrontendController::class, 'searchProfile']);
Route::get('/profile/{slug}', [FrontendController::class, 'profileDetails']);

Route::post('/user/login', [AuthController::class, 'login']);
Route::post('/user/register', [AuthController::class, 'register']);


Route::middleware(['auth:api'])->prefix('user')->group(function () {
    Route::get('profile-edit', [UserController::class, 'profileEdit']);
    Route::post('profile-update', [UserController::class, 'profileUpdate']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::middleware('ensure.profile.updated')->group(function(){
        Route::get('profile', [UserController::class, 'profile']);
        Route::post('image-upload', [UserController::class, 'imageUpload']);
        Route::post('image-delete', [UserController::class, 'deleteImage']);
        Route::post('update-setting', [UserController::class, 'updateSetting']);
        
        Route::get('matching-profiles', [UserController::class, 'matchingProfiles']);

        Route::get('invitations', [InvitationController::class, 'invitations']);
        Route::post('send-invitation', [InvitationController::class, 'sendInvitation']);
        Route::post('cancel-invitation', [InvitationController::class, 'cancelInvitation']);
        Route::post('accept-invitation', [InvitationController::class, 'acceptInvitation']);

        Route::get('message-list', [MessageController::class, 'chatList']);
        Route::get('fetch-messages', [MessageController::class, 'getMessages']);
        Route::post('send-message', [MessageController::class, 'sendMessage']);

        Route::post('profile/{userId}/like', [UserController::class, 'like']);
        Route::get('liked-profile/list', [UserController::class, 'listLikedProfiles']);

        Route::get('current-package', [SubscriptionController::class, 'currentPackage']);
        Route::post('subscribe', [SubscriptionController::class, 'subscribe']);
    });
});