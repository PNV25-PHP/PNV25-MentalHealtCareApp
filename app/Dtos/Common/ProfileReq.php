<?php

namespace App\Dtos\Common;

use Illuminate\Http\Request;

class ProFileReq
{
    public string $role;
    public string $email;
    public string $password;
    public string $fullname;
    public string $address;
    public string $phone;
    public string $url_image;

    public function __construct(
        Request $request
    ) {
        $this->role = $request->input("role");
        $this->email = $request->input("email");
        $this->password = $request->input("password");
        $this->fullname = $request->input("fullName");
        $this->phone = $request->input("phone");
        $this->address = $request->input("address");
        $this->url_image = $request->input("image");
    }
}
