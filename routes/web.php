<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GeneralsettingController;
use App\Http\Controllers\Admin\UsermanageController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\InvitationController;
use App\Http\Controllers\Frontend\MessageController;
use App\Http\Controllers\Frontend\SubscriptionController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index']);
Route::get('/wedding-details/{id}', [FrontendController::class, 'weddingDetails']);
Route::get('/all-profile', [FrontendController::class, 'allProfile']);
Route::get('/profile/{slug}', [FrontendController::class, 'profileDetails']);
Route::get('/blogs', [FrontendController::class, 'blogs']);
Route::get('/blog-details/{id}', [FrontendController::class, 'blogDetails']);
Route::get('/plans', [FrontendController::class, 'plans']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/enquiry', [FrontendController::class, 'enquiry']);
Route::post('/enquiry-submit', [FrontendController::class, 'enquirySubmit']);

Route::middleware('guest:user')->group(function () {
    Route::get('/user/login', [AuthController::class, 'login'])->name('user.login');
    Route::post('/user/login-submit', [AuthController::class, 'login_submit'])->name('user.loginSubmit');
    Route::get('/user/register', [AuthController::class, 'register'])->name('user.register');
    Route::post('/user/register-submit', [AuthController::class, 'registerSubmit'])->name('user.registerSubmit');
});

Route::group(['prefix' => 'user', 'middleware' => ['user.auth', 'ensure.profile.updated']], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('profile-edit', [UserController::class, 'profileEdit'])->name('user.profileEdit');
    Route::post('profile-edit-submit', [UserController::class, 'profileEditSubmit'])->name('user.profileEdit.submit');
    Route::post('images/upload', [UserController::class, 'imageUpload'])->name('user.imageUpload');
    Route::post('/image/delete', [UserController::class, 'deleteImage'])->name('user.imageDelete');
    Route::get('chat/list', [UserController::class, 'chatList'])->name('user.chat.list');
    Route::get('plan', [UserController::class, 'userPlan'])->name('user.plan');
    Route::get('setting', [UserController::class, 'setting'])->name('user.setting');
    Route::post('update-setting', [UserController::class, 'updateSetting'])->name('user.updateSetting');

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AdminAuthController::class, 'login'])->name('login');
        Route::post('login-submit', [AdminAuthController::class, 'login_submit'])->name('loginSubmit');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::get('user/manage', [UsermanageController::class, 'manage'])->name('user.manage');
        Route::get('user/incomplete', [UsermanageController::class, 'incomplete'])->name('user.incomplete');
        Route::get('user/add', [UsermanageController::class, 'add'])->name('user.add');
        Route::post('user/store', [UsermanageController::class, 'store'])->name('user.store');
        Route::get('user/edit/{id}', [UsermanageController::class, 'edit'])->name('user.edit');
        Route::post('user/update', [UsermanageController::class, 'update'])->name('user.update');

        Route::get('general-setting/edit', [GeneralsettingController::class, 'edit'])->name('generalsetting.edit');
        Route::post('general/setting/update', [GeneralsettingController::class, 'update'])->name('generalsetting.update');

        Route::get('blog/manage', [BlogController::class, 'manage'])->name('blog.manage');
        Route::get('blog/add', [BlogController::class, 'add'])->name('blog.add');
        Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('blog/update', [BlogController::class, 'update'])->name('blog.update');
        Route::post('blog/toggle-front', [BlogController::class, 'togglefront'])->name('blog.togglefront');
        Route::delete('blog/{id}', [BlogController::class, 'delete'])->name('blog.delete');

        Route::get('blog/category/manage', [BlogController::class, 'categorymanage'])->name('blog.category.manage');
        Route::post('blog/category/store', [BlogController::class, 'categorystore'])->name('blog.category.store');
        Route::post('blog/category/update', [BlogController::class, 'categoryupdate'])->name('blog.category.update');
        Route::get('blog/category/delete/{id}', [BlogController::class, 'categorydelete'])->name('blog.category.delete');

        Route::get('blog/tag/manage', [BlogController::class, 'tagmanage'])->name('blog.tag.manage');
        Route::post('blog/tag/store', [BlogController::class, 'tagstore'])->name('blog.tag.store');
        Route::post('blog/tag/update', [BlogController::class, 'tagupdate'])->name('blog.tag.update');
        Route::get('blog/tag/delete/{id}', [BlogController::class, 'tagdelete'])->name('blog.tag.delete');

        
        Route::get('banner/manage', [BannerController::class, 'manage'])->name('banner.manage');
        Route::post('banner/store', [BannerController::class, 'store'])->name('banner.store');
        Route::delete('banner/{id}', [BannerController::class, 'delete'])->name('banner.delete');
        Route::post('banner/toggle-status', [BannerController::class, 'togglestatus'])->name('banner.togglestatus');
        
        Route::get('city/manage', [CityController::class, 'manage'])->name('city.manage');
        Route::post('city/store', [CityController::class, 'store'])->name('city.store');
        Route::post('city/update', [CityController::class, 'update'])->name('city.update');
        Route::delete('city/{id}', [CityController::class, 'delete'])->name('city.delete');
        Route::post('city/toggle-status', [CityController::class, 'togglestatus'])->name('city.togglestatus');

        Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});