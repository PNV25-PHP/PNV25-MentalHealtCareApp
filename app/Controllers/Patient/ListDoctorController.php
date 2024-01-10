<?php

namespace App\Controllers\Patient;


use App\Repositories\DoctorRepository;
use Laravel\Lumen\Routing\Controller;

class ListDoctorController extends Controller
{
    public function index()
    {
        $request = new DoctorRepository;
        return view("pages\patient\HtmlListDoctor", ['doctors' => $request->getAllDoctor()]);
    }
    
}
