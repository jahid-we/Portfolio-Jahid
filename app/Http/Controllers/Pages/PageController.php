<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    // Index Page Start *************************************
    public function indexPage(Request $request): Response
    {
        return Inertia::render('index');
    }
    // Index Page End ***************************************

    // About Page Start *************************************
    public function aboutPage(Request $request): Response
    {
        return Inertia::render('about');
    }
    // About Page End ***************************************

    // Resume Page Start *************************************
    public function resumePage(Request $request): Response
    {
        return Inertia::render('resume');
    }
    // Resume Page End ***************************************

    // Services Page Start *************************************
    public function servicesPage(Request $request): Response
    {
        return Inertia::render('services');
    }
    // Services Page End ***************************************

    // Contact Page Start *************************************
    public function contactPage(Request $request): Response
    {
        return Inertia::render('contact');
    }
    // Contact Page End ***************************************

    // ADMIN******************************************************************************************

    // Login Page Start *************************************
    public function loginPage(Request $request): Response
    {
        return Inertia::render('Admin/Login');
    }
    // Login Page End ***************************************

    // Send Email Page Start *************************************
    public function sendEmailPage(Request $request): Response
    {
        return Inertia::render('Admin/SendEmail');
    }
    // Send Email Page End ***************************************

    // Reset Password Page Start *************************************
    public function resetPasswordPage(string $token): Response
    {
        return Inertia::render('Admin/ResetPassword', ['token' => $token, 'appUrl' => config('app.url')]);
    }
    // Reset Password Page End ***************************************

    // Dashboard Page Start *************************************
    public function dashBoard(Request $request): Response
    {
        return Inertia::render('Admin/AdminDashboard');
    }
    // Dashboard Page End ***************************************

    // Messages Page Start *************************************
    public function messages(Request $request): Response
    {
        return Inertia::render('Admin/Messages');
    }
    // Messages Page End ****************************************

    // Location Page Start *************************************
    public function location(Request $request): Response
    {
        return Inertia::render('Admin/Location');
    }
    // Location Page End ***************************************

    // Address Page Start *************************************
    public function address(Request $request): Response
    {
        return Inertia::render('Admin/Address');
    }
    // Address Page End ***************************************

}
