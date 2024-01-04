<?php

namespace App\Controllers\Common;

use App\Dtos\Common\SignInRes;
use App\Dtos\Common\SignInReq;
use App\Repositories\UserRepository;
use App\Repositories\PatientRepository;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class SignInController extends Controller
{
    public function index()
    {
        return view("pages\Common\SignIn");
    }

    public function signIn(Request $req)
    {
        $signInRequest = new SignInReq($req);

        if ($signInRequest->email == null || $signInRequest->password == null) {
            return response()->json([
                'message' => 'Please enter complete information',
            ], 401);
        }

        $userRepository = new UserRepository();
        $user = $userRepository->findByEmail($signInRequest->email);

        if ($user == null || $user->getPassword() != $signInRequest->password) {
            return response()->json([
                'message' => 'User not found or invalid credentials',
            ], 401);
        }

        $requestPatient = new PatientRepository();
        $patientId = $requestPatient->findByEmail($signInRequest->email);
        return response()->json([
            'message' => 'Sign in Successfully',
            'payload' => new SignInRes(
                $patientId,
                $user->getId(),
                $user->getRole()->getValue(),
                $user->getEmail(),
                $user->getFullname(),
                $user->getPassword(),
                $user->getPhone(),
                $user->getAddress(),
                $user->getUrlImage()
            )
        ]);
    }
}
