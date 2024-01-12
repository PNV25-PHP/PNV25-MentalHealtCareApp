<?php

namespace App\Controllers\Patient;

// use App\Repositories\PostsRepository;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Dtos\Patient\NewPostReq;

class NewPostController extends Controller
{

    public function index()
    {
        $sql = "SELECT 
        p.Id AS PostId, 
        p.UserId AS PostUserId, 
        p.Content AS PostContent, 
        p.Url_Image AS PostImage, 
        p.CreatedAt AS PostCreatedAt, 
        u.Role AS UserRole, 
        u.Email AS UserEmail, 
        u.FullName AS UserFullName, 
        u.Phone AS UserPhone, 
        u.Address AS UserAddress, 
        u.Url_Image AS UserImageUrl,
        c.CommentId AS CommentId,
        c.UserId AS CommentUserId,
        c.CommentContent AS CommentContent,
        c.PostId AS CommentPostId,
        c.CreatedAt AS CommentCreatedAt
    FROM posts p
    JOIN users u ON p.UserId = u.Id
    LEFT JOIN comments c ON p.CommentId = c.CommentId
    ORDER BY p.CreatedAt DESC;";
    $sql2 = "SELECT c.*, u.Role AS UserRole, u.Email AS UserEmail, u.FullName AS UserFullName, u.Phone AS UserPhone, u.Address AS UserAddress, u.Url_Image AS UserImageUrl
    FROM comments c
    JOIN users u ON c.UserId = u.Id;
    ";
        $posts = DB::select($sql);
        $comments = DB::select($sql2);
        return view('pages.patient.Post')->with(['posts' => $posts, 'comments' => $comments]);
    }
    public function addPost(Request $request)
    {
        $req = new NewPostReq($request);
        // Kiểm tra xem Url_Image đã được gửi lên hay không
        if ($req->image === null || $req->image === "") {
            return response()->json(['error' => 'Hình ảnh không được bỏ trống'], 400);
        }

        // Thêm bài viết vào cơ sở dữ liệu
        $sql = "INSERT INTO posts (UserId, Content, Url_Image) VALUES (?, ?, ?);";
        $params = [
            $req->userId,
            $req->content,
            $req->image,
        ];

        DB::insert($sql, $params);

        return response()->json(['success' => 'Bài viết đã được thêm thành công'], 200);
    }
}
