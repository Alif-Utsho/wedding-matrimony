<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ContactinfoController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnquirymanageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GeneralsettingController;
use App\Http\Controllers\Admin\HobbyController;
use App\Http\Controllers\Admin\OurteamController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SpecialPackageController;
use App\Http\Controllers\Admin\SpecialSubController;
use App\Http\Controllers\Admin\SubPackageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UsermanageController;
use App\Http\Controllers\Admin\UserverificationController;
use App\Http\Controllers\Admin\WeddingController;
use App\Http\Controllers\Admin\WeddingGalleryController;
use App\Http\Controllers\Admin\WeddingStepController;
use App\Http\Controllers\Admin\WeddingStoryController;
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
Route::get('/photo-gallery', [FrontendController::class, 'photoGallery']);
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

    Route::get('verification-edit', [UserController::class, 'verificationEdit'])->name('user.verificationEdit');
    Route::post('verification-edit-submit', [UserController::class, 'verificationEditSubmit'])->name('user.verificationEdit.submit');

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

    Route::get('/profile-download', [UserController::class, 'downloadProfileDownload'])->name('user.profile.download');

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
        Route::delete('user/{id}', [UsermanageController::class, 'delete'])->name('user.delete');

        Route::get('user/bill/{id}', [UsermanageController::class, 'bill'])->name('user.bill');
        Route::get('user/show/{id}', [UsermanageController::class, 'show'])->name('user.show');

        Route::get('push-notification', [DashboardController::class, 'pushNotification'])->name('push-notification');
        Route::post('push-notification-send', [DashboardController::class, 'pushNotificationSend'])->name('push-notification.send');

        Route::get('user/verifications', [UserverificationController::class, 'manage'])->name('user.verification');
        Route::post('user/verified', [UserverificationController::class, 'verify'])->name('user-verification.verify');
        Route::delete('user/verification/{id}', [UserverificationController::class, 'delete'])->name('user-verification.delete');

        //Package Route
        Route::get('package/manage', [PackageController::class, 'manage'])->name('package.manage');
        Route::get('package/add', [PackageController::class, 'add'])->name('package.add');
        Route::post('package/store', [PackageController::class, 'store'])->name('package.store');
        Route::get('package/edit/{id}', [PackageController::class, 'edit'])->name('package.edit');
        Route::post('package/update', [PackageController::class, 'update'])->name('package.update');
        Route::post('package/toggle-status', [PackageController::class, 'togglestatus'])->name('package.togglestatus');
        Route::delete('package/{id}', [PackageController::class, 'delete'])->name('package.delete');
        Route::get('package/payment', [PackageController::class, 'PackagePaymentList'])->name('package.payment');

        //Sub Package Route
        Route::get('subpackage/manage', [SubPackageController::class, 'manage'])->name('subpackage.manage');
        Route::get('subpackage/add', [SubPackageController::class, 'add'])->name('subpackage.add');
        Route::post('subpackage/store', [SubPackageController::class, 'store'])->name('subpackage.store');
        Route::get('subpackage/edit/{id}', [SubPackageController::class, 'edit'])->name('subpackage.edit');
        Route::post('subpackage/update', [SubPackageController::class, 'update'])->name('subpackage.update');
        Route::post('subpackage/toggle-status', [SubPackageController::class, 'togglestatus'])->name('subpackage.togglestatus');
        Route::delete('subpackage/{id}', [SubPackageController::class, 'delete'])->name('subpackage.delete');

        //Special Package Route
        Route::get('specialpkg/manage', [SpecialPackageController::class, 'manage'])->name('specialpkg.manage');
        Route::get('specialpkg/add', [SpecialPackageController::class, 'add'])->name('specialpkg.add');
        Route::post('specialpkg/store', [SpecialPackageController::class, 'store'])->name('specialpkg.store');
        Route::get('specialpkg/edit/{id}', [SpecialPackageController::class, 'edit'])->name('specialpkg.edit');
        Route::post('specialpkg/update', [SpecialPackageController::class, 'update'])->name('specialpkg.update');
        Route::post('specialpkg/toggle-status', [SpecialPackageController::class, 'togglestatus'])->name('specialpkg.togglestatus');
        Route::delete('specialpkg/{id}', [SpecialPackageController::class, 'delete'])->name('specialpkg.delete');

        //Special Sub Package Route
        Route::get('specialcategory/manage', [SpecialSubController::class, 'manage'])->name('specialcategory.manage');
        Route::get('specialcategory/add', [SpecialSubController::class, 'add'])->name('specialcategory.add');
        Route::post('specialcategory/store', [SpecialSubController::class, 'store'])->name('specialcategory.store');
        Route::get('specialcategory/edit/{id}', [SpecialSubController::class, 'edit'])->name('specialcategory.edit');
        Route::post('specialcategory/update', [SpecialSubController::class, 'update'])->name('specialcategory.update');
        Route::post('specialcategory/toggle-status', [SpecialSubController::class, 'togglestatus'])->name('specialcategory.togglestatus');
        Route::delete('specialcategory/{id}', [SpecialSubController::class, 'delete'])->name('specialcategory.delete');

        Route::get('enquiry/manage', [EnquirymanageController::class, 'manage'])->name('enquiry.manage');
        Route::post('enquiry/toggle-status', [EnquirymanageController::class, 'togglestatus'])->name('enquiry.togglestatus');
        Route::delete('enquiry/{id}', [EnquirymanageController::class, 'delete'])->name('enquiry.delete');

        Route::get('general-setting/edit', [GeneralsettingController::class, 'edit'])->name('generalsetting.edit');
        Route::post('general/setting/update', [GeneralsettingController::class, 'update'])->name('generalsetting.update');

        Route::get('contact-info/edit', [ContactinfoController::class, 'edit'])->name('contactinfo.edit');
        Route::post('contact-info/update', [ContactinfoController::class, 'update'])->name('contactinfo.update');

        Route::get('wedding/manage', [WeddingController::class, 'manage'])->name('wedding.manage');
        Route::get('wedding/add', [WeddingController::class, 'add'])->name('wedding.add');
        Route::post('wedding/store', [WeddingController::class, 'store'])->name('wedding.store');
        Route::get('wedding/edit/{id}', [WeddingController::class, 'edit'])->name('wedding.edit');
        Route::post('wedding/update', [WeddingController::class, 'update'])->name('wedding.update');
        Route::post('wedding/toggle-front', [WeddingController::class, 'togglefront'])->name('wedding.togglefront');
        Route::delete('wedding/{id}', [WeddingController::class, 'delete'])->name('wedding.delete');

        Route::get('wedding-gallery/manage/{id}', [WeddingGalleryController::class, 'manage'])->name('weddinggallery.manage');
        Route::post('wedding-gallery/store', [WeddingGalleryController::class, 'store'])->name('weddinggallery.store');
        Route::delete('wedding-gallery/{id}', [WeddingGalleryController::class, 'delete'])->name('weddinggallery.delete');
        Route::post('wedding-gallery/toggle-status', [WeddingGalleryController::class, 'togglestatus'])->name('weddinggallery.togglestatus');

        Route::get('wedding-story/manage/{id}', [WeddingStoryController::class, 'manage'])->name('weddingstory.manage');
        Route::post('wedding-story/store', [WeddingStoryController::class, 'store'])->name('weddingstory.store');
        Route::post('wedding-story/update', [WeddingStoryController::class, 'update'])->name('weddingstory.update');
        Route::delete('wedding-story/{id}', [WeddingStoryController::class, 'delete'])->name('weddingstory.delete');
        Route::post('wedding-story/toggle-status', [WeddingStoryController::class, 'togglestatus'])->name('weddingstory.togglestatus');

        Route::get('wedding-step/manage', [WeddingStepController::class, 'manage'])->name('weddingstep.manage');
        Route::post('wedding-step/store', [WeddingStepController::class, 'store'])->name('weddingstep.store');
        Route::post('wedding-step/update', [WeddingStepController::class, 'update'])->name('weddingstep.update');
        Route::delete('wedding-step/{id}', [WeddingStepController::class, 'delete'])->name('weddingstep.delete');
        Route::post('wedding-step/toggle-status', [WeddingStepController::class, 'togglestatus'])->name('weddingstep.togglestatus');

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

        //FAQ Routes
        Route::get('faq/manage', [FaqController::class, 'manage'])->name('faq.manage');
        Route::get('faq/add', [FaqController::class, 'add'])->name('faq.add');
        Route::post('faq/store', [FaqController::class, 'store'])->name('faq.store');
        Route::get('faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
        Route::post('faq/update', [FaqController::class, 'update'])->name('faq.update');
        Route::delete('faq/{id}', [FaqController::class, 'delete'])->name('faq.delete');

        Route::get('banner/manage', [BannerController::class, 'manage'])->name('banner.manage');
        Route::post('banner/store', [BannerController::class, 'store'])->name('banner.store');
        Route::delete('banner/{id}', [BannerController::class, 'delete'])->name('banner.delete');
        Route::post('banner/toggle-status', [BannerController::class, 'togglestatus'])->name('banner.togglestatus');

        Route::get('city/manage', [CityController::class, 'manage'])->name('city.manage');
        Route::post('city/store', [CityController::class, 'store'])->name('city.store');
        Route::post('city/update', [CityController::class, 'update'])->name('city.update');
        Route::delete('city/{id}', [CityController::class, 'delete'])->name('city.delete');
        Route::post('city/toggle-status', [CityController::class, 'togglestatus'])->name('city.togglestatus');

        Route::get('hobby/manage', [HobbyController::class, 'manage'])->name('hobby.manage');
        Route::post('hobby/store', [HobbyController::class, 'store'])->name('hobby.store');
        Route::post('hobby/update', [HobbyController::class, 'update'])->name('hobby.update');
        Route::delete('hobby/{id}', [HobbyController::class, 'delete'])->name('hobby.delete');
        Route::post('hobby/toggle-status', [HobbyController::class, 'togglestatus'])->name('hobby.togglestatus');

        Route::get('ourteam/manage', [OurteamController::class, 'manage'])->name('ourteam.manage');
        Route::get('ourteam/add', [OurteamController::class, 'add'])->name('ourteam.add');
        Route::post('ourteam/store', [OurteamController::class, 'store'])->name('ourteam.store');
        Route::get('ourteam/edit/{id}', [OurteamController::class, 'edit'])->name('ourteam.edit');
        Route::post('ourteam/update', [OurteamController::class, 'update'])->name('ourteam.update');
        Route::post('ourteam/toggle-front', [OurteamController::class, 'togglestatus'])->name('ourteam.togglestatus');
        Route::delete('ourteam/{id}', [OurteamController::class, 'delete'])->name('ourteam.delete');

        Route::get('service/manage', [ServiceController::class, 'manage'])->name('service.manage');
        Route::get('service/add', [ServiceController::class, 'add'])->name('service.add');
        Route::post('service/store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::post('service/update', [ServiceController::class, 'update'])->name('service.update');
        Route::post('service/toggle-status', [ServiceController::class, 'togglestatus'])->name('service.togglestatus');
        Route::delete('service/{id}', [ServiceController::class, 'delete'])->name('service.delete');

        Route::get('testimonial/manage', [TestimonialController::class, 'manage'])->name('testimonial.manage');
        Route::get('testimonial/add', [TestimonialController::class, 'add'])->name('testimonial.add');
        Route::post('testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
        Route::get('testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
        Route::post('testimonial/update', [TestimonialController::class, 'update'])->name('testimonial.update');
        Route::post('testimonial/toggle-status', [TestimonialController::class, 'togglestatus'])->name('testimonial.togglestatus');
        Route::delete('testimonial/{id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');

        Route::get('logout', [AdminAuthController::class, 'logout'])->name('logout');
    });
});