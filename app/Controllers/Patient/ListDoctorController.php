<?php

namespace App\Controllers\Patient;


use App\Repositories\DoctorRepository;
use Laravel\Lumen\Routing\Controller;
use App\Repositories\UserRepository;
class ListDoctorController extends Controller
{
    private UserRepository $userRepository;
    public function index()
    {
        $this->userRepository = new UserRepository();
        $this->userRepository->checkLogin();
        $request = new DoctorRepository;
        return view("pages\patient\HtmlListDoctor", ['doctors' => $request->getAllDoctor()]);
    }
    
}
