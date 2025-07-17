<?php

use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Pages\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [PageController::class, 'indexPage']);

// =====================================================
// =============== Authentication Routes ===============
// =====================================================
Route::post('/login', ['AuthenticationController', 'login'])->middleware('guest')->name('login');

Route::middleware('auth')->controller(AuthenticationController::class)->group(function () {

    Route::post('/logout', 'logout')->name('logout');

});

// =====================================================
// =============== Reset Password Routes ===============
// =====================================================
Route::middleware('guest')->controller(ResetPasswordController::class)->group(function () {
    Route::post('/send-email', 'sendEmail')->name('sendEmail');
    Route::post('/reset-password', 'resetPassword')->name('resetPassword');
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

