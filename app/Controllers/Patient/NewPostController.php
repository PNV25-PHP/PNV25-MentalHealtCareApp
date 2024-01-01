<?php

namespace App\Controllers\Patient;

use App\Dtos\Patient\NewPostRes;
use App\Dtos\Patient\NewPostReq;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller;

class NewPostController extends Controller
{
    public function index()
    {                                          //p.timepost,
        $posts = DB::select('SELECT u.FullName, p.timepost, pst.Conten, pst.Url_Image, u.Url_Image
        FROM posts pst
        JOIN patients pt ON pst.UserId = pt.UserId
        JOIN users u ON pt.UserId = u.Id
        WHERE u.Role = "patient"');
        // $users = DB::select('SELECT * FROM user ');
        return view('pages.patient.Post', compact('posts'));
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
