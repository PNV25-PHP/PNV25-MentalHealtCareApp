<?php
namespace App\Dtos\Patient;

use Illuminate\Http\Request;

class NewPostReq
{
    public string $userId;
    public string $content;
    public string $image;

    public function __construct(Request $req)
    {
        $this->userId = $req->input("userId");
        $this->image = $req->input("urlImage");
        $this->content = $req->input("content");
    }

}
