<?php

namespace App\Controllers\Patient;

// use App\Repositories\PostsRepository;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Http\Client\Request;

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

    public function addPost(Request $req)
{
    $post = new Post($req->getUserId(), $req->getContent(), $req->getUrl_Image(), $req->getCreateAt());

    $sql = "INSERT INTO posts (Id, UserId, Content, Url_Image, CreatedAt) VALUES (?, ?, ?, ?, ?);";
    $params = [
        $post->getId(),
        $post->getUserId(),
        $post->getContent(),
        $post->getUrl_Image(),
        $post->getCreateAt(),
    ];

    $result = DB::insert($sql, $params);

    if ($result) {
        return "message cập nhật thành công";
    } else {
        return "message cập nhật không thành công";
    }
}
}
