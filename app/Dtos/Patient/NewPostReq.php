<?php
namespace App\Dtos\Patient;

use Illuminate\Http\Request;

class NewPostReq
{
    public string $image;
    public string $conten;

    public function __construct(Request $req)
    {
        $this->image = $req->input("image");
        $this->conten = $req->input("conten");
    }

    public function validate()
    {
        return [
            "image" => "Dosen't has",
            "conten" => "Too long",
        ];
    }
}
