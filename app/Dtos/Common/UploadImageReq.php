<?php
namespace App\Dtos\Common;

use Illuminate\Http\Request;

class UploadImageReq
{
    public string $Image;

    public function __construct(Request $req)
    {
        $this->Image = $req->input("image");
        
    }

}
