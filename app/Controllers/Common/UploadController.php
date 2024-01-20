<?php

namespace App\Controllers\Common;

use App\Dtos\Common\SignInRes;
use App\Dtos\Common\SignInReq;
use App\Dtos\Common\UploadImageReq;
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

    public function uploadImage12(Request $request)
    {   
        $req = new UploadImageReq($request);
        $data = $req->Image;
        if (isset($data)) {
            
            $base64Image = $data;
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));

            $imageName = uniqid() . '.png';
            $imagePath = 'public/upload/user/' . $imageName;

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
}
