<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\PageController;

Route::get("/",[PageController::class, "indexPage"]);
Route::get("/about",[PageController::class, "aboutPage"]);
Route::get("/resume",[PageController::class, "resumePage"]);
Route::get("/services",[PageController::class, "servicesPage"]);
Route::get("/contact",[PageController::class, "contactPage"]);

