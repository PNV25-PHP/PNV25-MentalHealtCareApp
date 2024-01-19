<?php

namespace App\Controllers\Patient;
use App\Repositories\UserRepository;
use Laravel\Lumen\Routing\Controller;

class HomeController extends Controller
{
    private UserRepository $userRepository;
    public function index()
    {
        $this->userRepository = new UserRepository();
        $this->userRepository->checkLogin();
        return view("pages\common\HtmlHomePage");
    }
}
