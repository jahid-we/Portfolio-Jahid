<?php

use App\Http\Controllers\Pages\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [PageController::class, 'indexPage']);

//  Public Page Routes Start ***************************************************************
Route::controller(PageController::class)->group(function () {
    Route::get('/', 'indexPage')->name('home');
    Route::get('/about', 'aboutPage')->name('about');
    Route::get('/resume', 'resumePage')->name('resume');
    Route::get('/services', 'servicesPage')->name('services');
    Route::get('/contact', 'contactPage')->name('contact');
});
//  Public Page Routes End ******************************************************************
