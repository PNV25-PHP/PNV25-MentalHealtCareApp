<?php

namespace App\Controllers\Common;

use App\Dtos\Common\SignInRes;
use App\Dtos\Common\SignInReq;
use App\Models\Role;
use App\Models\User;
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

        // TODO validate the request

        // TODO call to db find by email then check for password
        $user = new User(Role::Patient, $signInRequest->email, "1", "vupham", "101B", "", "image");

        if ($user == null || $user->getPassword() != $signInRequest->password) {
            return response()->json([
                'message' => 'User not found or invalid credentials',
            ], 401);
        }

        return response()->json([
            'message' => 'Sign in Successfully',
            'payload' => new SignInRes(
                $user->getId(),
                $user->getRole()->getValue(),
                $user->getEmail(),
                $user->getFullname())
        ]);
    }
}
