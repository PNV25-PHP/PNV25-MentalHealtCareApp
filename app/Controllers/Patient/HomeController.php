<?php

namespace App\Controllers\Patient;

use Laravel\Lumen\Routing\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view("layouts\HtmlNavbar");
    }
}
