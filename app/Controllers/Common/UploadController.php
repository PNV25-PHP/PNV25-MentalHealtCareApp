<?php

namespace App\Controllers\Common;

use App\Dtos\Common\SignInRes;
use App\Dtos\Common\SignInReq;
use App\Repositories\UserRepository;
use App\Repositories\PatientRepository;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class UploadController extends Controller
{
    public function index()
    {
       return view('pages.images.html');
    }

    public function uploadImage(Request $request)
    {
        $data = $request->json()->all();

        if (isset($data['image'])) {
            $base64Image = $data['image'];
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

            $imageName = uniqid() . '.png';
            $imagePath = 'pages/images/' . $imageName;

            // Lưu hình ảnh vào thư mục trên máy chủ
            file_put_contents($imagePath, $imageData);

            // URL của hình ảnh trên máy chủ
            $imageUrl = url($imagePath);

            // Phản hồi về client với URL của hình ảnh
            return response()->json(['success' => true, 'imageUrl' => $imageUrl]);
        } else {
            return response()->json(['success' => false, 'error' => 'Image data not provided']);
        }
    }

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $data = json_decode(file_get_contents('php://input'), true);

    //     if (isset($data['image'])) {
    //         $base64Image = $data['image'];
    //         $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

    //         // Lưu hình ảnh vào thư mục trên máy chủ hoặc thực hiện xử lý tùy chọn
    //         file_put_contents('uploads/' . uniqid() . '.png', $imageData);

    //         // Phản hồi về client
    //         echo json_encode(['success' => true]);
    //     } else {
    //         echo json_encode(['success' => false, 'error' => 'Image data not provided']);
    //     }
    // } else {
    //     echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    // }
}
