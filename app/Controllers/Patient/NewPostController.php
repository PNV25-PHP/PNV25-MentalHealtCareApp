<?php

namespace App\Controllers\Patient;

use App\Dtos\Patient\NewPostRes;
use App\Dtos\Patient\NewPostReq;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class NewPostController extends Controller
{
    public function index()
    {
        return view('pages\patient\Post');
    }

    // public function uploadImage(Request $Req)
    // {

    // }
}
