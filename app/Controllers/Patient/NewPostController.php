<?php

namespace App\Controllers\Patient;

use App\Dtos\Patient\NewPostRes;
use App\Dtos\Patient\NewPostReq;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class NewPostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('pages\patient\Post', compact('posts'));
    }

    // public function uploadImage(Request $Req)
    // {
    //     $NewPostRequest = new NewPostReq($Req);
        // TODO validate the request

        // TODO call to db find by email then check for password
        // $user = new User(Role::Patient, $NewPostRequest->conten, $NewPostRequest->image);

        // if ($user == null || $user->getPassword() != $NewPostRequest->password) {
        //     return response()->json([
        //         'message' => 'User not found or invalid credentials',
        //     ], 401);
        // }

        // return response()->json([
        //     'message' => 'Sign in Successfully',
        //     'payload' => new NewPostRes(
        //         $user->getimage(),
        //         $user->getRole()->getValue(),
        //         $user->getEmail(),
        //         $user->getFullname())
        // ]);
    // }
}
