<?php

namespace App\Controllers\Patient;

// use App\Repositories\PostsRepository;
use Laravel\Lumen\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Dtos\Patient\NewPostReq;
use Carbon\Carbon;

class NewPostController extends Controller
{

    public function index()
    {
        $sql = "SELECT p.Id, p.UserId, p.Content, p.Url_Image AS Image, p.CreatedAt, u.Role, u.Email, u.FullName, u.Phone, u.Address, u.Url_Image
        FROM posts p
        JOIN users u ON p.UserId = u.Id
        ORDER BY p.CreatedAt DESC;
        ";
        $posts = DB::select($sql);
        return view('pages.patient.Post')->with('posts', $posts);
    }
    public function addPost(Request $request)
    {
        $req = new NewPostReq($request);

        // Kiểm tra xem Url_Image đã được gửi lên hay không
        if ($req->image === null || $req->image === "") {
            return response()->json(['error' => 'Hình ảnh không được bỏ trống'], 400);
        }

        // // Kiểm tra số lượng bài viết trong ngày
        // $userId = $req->userId;
        // $todayPostsCount = DB::table('posts')
        //     ->where('UserId', $userId)
        //     ->whereRaw('DATE(CreatedAt) = CURDATE()')
        //     ->count();

        // // Nếu số lượng bài viết đã đạt đến giới hạn (trong trường hợp này là 3), từ chối thêm bài viết mới
        // $maxPostsPerDay = 3;
        // if ($todayPostsCount >= $maxPostsPerDay) {
        //     return response()->json(['error' => 'Đã đạt đến số lượng bài viết tối đa trong ngày'], 400);
        // }

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
