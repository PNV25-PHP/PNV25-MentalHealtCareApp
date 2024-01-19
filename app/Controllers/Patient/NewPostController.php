<?php

namespace App\Controllers\Patient;

use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Dtos\Patient\NewPostReq;
use App\Dtos\Common\CommentReq;
use App\Repositories\UserRepository;
class NewPostController extends Controller
{
    private UserRepository $userRepository;
    
    public function index()
    {
        $this->userRepository = new UserRepository();
        $this->userRepository->checkLogin();
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
        COUNT(c.CommentId) AS CommentCount  -- Sử dụng COUNT để đếm số lượng bình luận
    FROM 
        posts p
    JOIN 
        users u ON p.UserId = u.Id
    LEFT JOIN 
        comments c ON p.Id = c.PostId  -- Sửa điều kiện join từ CommentId sang PostId
    GROUP BY 
        p.Id, p.UserId, p.Content, p.Url_Image, p.CreatedAt, u.Role, u.Email, u.FullName, u.Phone, u.Address, u.Url_Image
    ORDER BY 
        p.CreatedAt DESC;
    ";
        $sql2 = "SELECT c.*, u.Role AS UserRole, u.Email AS UserEmail, u.FullName AS UserFullName, u.Phone AS UserPhone, u.Address AS UserAddress, u.Url_Image AS UserImageUrl
    FROM comments c
    JOIN users u ON c.UserId = u.Id ORDER BY c.CreatedAt DESC;";
        $posts = DB::select($sql);
        $comments = DB::select($sql2);
        return view('pages.patient.Post')->with(['posts' => $posts, 'comments' => $comments]);
    }

    public function addPost(Request $request)
    {
        $req = new NewPostReq($request);
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

    public function addComment(Request $request)
    {
        $req = new CommentReq($request);
        // Thêm 1 row comment vào cơ sở dữ liệu
        if($req->CommentContent === "" || $req->CommentContent === null){
            return response()->json(['error' => 'Comment thêm không thành công'], 400);
        }
        $sql = "INSERT INTO comments (PostId, UserId, CommentContent) VALUES (?, ?, ?);";
        $params = [
            $req->PostId,
            $req->UserId,
            $req->CommentContent,
        ];
        DB::insert($sql, $params);
        return response()->json(['success' => 'Comment đã được thêm thành công'], 200);
    }
}
