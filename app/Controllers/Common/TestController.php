<?php

namespace App\Controllers\Common;

use Laravel\Lumen\Routing\Controller;

class TestController extends Controller
{
    public function index()
    {
        return view("pages\Test");
    }
}
