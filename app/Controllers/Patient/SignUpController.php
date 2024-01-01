<?php

namespace App\Controllers\Patient;

use App\Dtos\Common\SignInRes;
use App\Dtos\Patient\SignUpReq;
use App\Models\Patient;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class SignUpController extends Controller
{
    public function index()
    {
        return view("pages\patient\SignUp");
    }

    public function signUp(Request $req)
    {
        $signUpReq = new SignUpReq($req);

        //        $error = $signUpReq->validate();
        $error = null;
        if ($error != null) {
            return response()->json([
                "message" => "validation error",
                "error" => $error
            ], 400);
        }

        // TODO create new user and new patient
        $newUser = new User(Role::Patient, $signUpReq->email, $signUpReq->password, $signUpReq->fullName);
        $newPatient = new Patient($newUser->getId());
        // TODO insert to db

        return response()->json([
            'message' => 'Sign Up Successfully',
            'payload' => new SignInRes(
                $newUser->getId(),
                $newUser->getRole()->getValue(),
                $newUser->getEmail(),
                $newUser->getFullname()
            )
        ], 201);
    }
}
