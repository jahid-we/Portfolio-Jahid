<?php

namespace App\Http\Controllers\Pages;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    // Index Page Start *************************************
    public function indexPage(Request $request): Response
    {
        return Inertia::render("index");
    }
    // Index Page End ***************************************

    // About Page Start *************************************
    public function aboutPage(Request $request): Response
    {
        return Inertia::render("about");
    }
    // About Page End ***************************************

    // Resume Page Start *************************************
    public function resumePage(Request $request): Response
    {
        return Inertia::render("resume");
    }
    // Resume Page End ***************************************

    // Services Page Start *************************************
    public function servicesPage(Request $request): Response
    {
        return Inertia::render("services");
    }
    // Services Page End ***************************************

    // Contact Page Start *************************************
    public function contactPage(Request $request): Response
    {
        return Inertia::render("contact");
    }
    // Contact Page End ***************************************





}
