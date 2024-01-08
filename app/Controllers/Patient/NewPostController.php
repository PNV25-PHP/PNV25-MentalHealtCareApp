<?php

namespace App\Controllers\Patient;

// use App\Repositories\PostsRepository;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class NewPostController extends Controller
{

    public function index()
    {
        $sql = "SELECT p.Id, p.UserId, p.Content, p.Image, p.CreatedAt, u.Role, u.Email, u.FullName, u.Phone, u.Address, u.Url_Image
        FROM posts p
        JOIN users u ON p.UserId = u.Id;";
        $posts = DB::select($sql);
        return view('pages.patient.Post')->with('posts', $posts);
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
