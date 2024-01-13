<?php
namespace App\Dtos\Common;

use Illuminate\Http\Request;

class CommentReq
{
    public string $PostId;
    public string $UserId;
    public string $CommentContent;

    public function __construct(Request $req)
    {
        $this->PostId = $req->input("PostId");
        $this->UserId = $req->input("UserId");
        $this->CommentContent = $req->input("CommentContent");
    }

}
