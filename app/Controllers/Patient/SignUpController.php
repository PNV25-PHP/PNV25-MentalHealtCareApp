<?php

namespace App\Controllers\Patient;

use App\Dtos\Common\SignInRes;
use App\Dtos\Patient\SignUpReq;
use App\Models\Patient;
use App\Models\Role;
use App\Models\User;
use App\Repositories\PatientRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class SignUpController extends Controller
{
    private UserRepository $userRepository;
    private PatientRepository $patientRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->patientRepository = new PatientRepository();
    }
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

        $this->userRepository->insert($newUser);
        $this->patientRepository->insert($newPatient);

        $requestPatient = new PatientRepository();
        $patientId = $requestPatient->findByEmail($signUpReq->email);

        return response()->json([
            'message' => 'Sign Up Successfully',
            'payload' => new SignInRes(
                $patientId,
                $newUser->getId(),
                $newUser->getRole()->getValue(),
                $newUser->getEmail(),
                $newUser->getFullname(),
                $newUser->getPassword(),
                $newUser->getPhone(),
                $newUser->getAddress(),
                $newUser->getUrlImage()
            )
        ], 200);
    }
}
