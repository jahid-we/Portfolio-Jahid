<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Pages\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [PageController::class, 'indexPage']);

// =====================================================
// =============== Authentication Routes ===============
// =====================================================
Route::post('/login', [AuthenticationController::class, 'login'])->middleware('guest')->name('login');

Route::middleware('auth')->controller(AuthenticationController::class)->group(function () {

    Route::get('/logout', 'logout')->name('logout');

});

// =====================================================
// =============== Reset Password Routes ===============
// =====================================================
Route::middleware('guest')->controller(ResetPasswordController::class)->group(function () {
    Route::post('/send-email', 'sendEmail')->name('sendEmail');
    Route::post('/reset-password', 'resetPassword')->name('resetPassword');
});

// =====================================================
// =============== Manage Message Routes ===============
// =====================================================
Route::post('/create-message', [MessageController::class, 'createMessage']);

Route::middleware('auth')->controller(MessageController::class)->group(function () {
    Route::get('/get-all-messages', 'getAllMessage')->name('getAllMessage');
    Route::get('/messages/{id}', 'getMessageById')->name('getMessageById');
    Route::delete('/delete-messages/{id}', 'deleteMessageById')->name('deleteMessageById');
    Route::delete('/delete-all-messages', 'deleteAllMessage')->name('deleteAllMessage');
});

// =====================================================
// =============== Manage Location Routes ==============
// =====================================================
Route::middleware('auth')->controller(LocationController::class)->group(function () {
    Route::post('/create-map-url', 'createMapUrl')->name('createMapUrl');
    Route::get('/get-map-url', 'getMapUrl')->name('getMapUrl');
    Route::delete('/delete-map-url', 'deleteMapUrl')->name('deleteMapUrl');

});
// =====================================================
// =============== Manage Address Routes ==============
// =====================================================
Route::middleware('auth')->controller(AddressController::class)->group(function () {
    Route::post('/create-address', 'createAddress')->name('createAddress');
    Route::get('/get-address', 'getAddress')->name('getAddress');
    Route::delete('/delete-address', 'deleteAddress')->name('deleteAddress');

});

// =====================================================
// =============== Public Page Routes ===============
// =====================================================
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'indexPage')->name('home');
    Route::get('/about', 'aboutPage')->name('about');
    Route::get('/resume', 'resumePage')->name('resume');
    Route::get('/services', 'servicesPage')->name('services');
    Route::get('/contact', 'contactPage')->name('contact');
});

// =====================================================
// =============== Admin Page Routes ===================
// =====================================================

Route::middleware('guest')->controller(PageController::class)->group(function () {
    Route::get('/login', 'loginPage')->name('loginPage');
    Route::get('/send-email', 'sendEmailPage')->name('sendEmailPage');
    Route::get('/resetPassword/{token}', 'resetPasswordPage')->name('resetPasswordPage');

});

// =====================================================
// =============== Admin DashBoard Routes ===================
// =====================================================

Route::middleware('auth')->controller(PageController::class)->group(function () {

    Route::get('/dashboard', 'dashBoard')->name('dashBoard');
    Route::get('/messages', 'messages')->name('messages');
    Route::get('/location', 'location')->name('location');
    Route::get('/address', 'address')->name('address');

});
