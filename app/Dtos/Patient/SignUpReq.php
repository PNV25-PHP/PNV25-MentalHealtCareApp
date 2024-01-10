<?php

namespace App\Dtos\Patient;

use Illuminate\Http\Request;

class SignUpReq
{
    public string $email;
    public string $fullName;
    public string $password;

    public function __construct(Request $req)
    {
        $this->email = $req->input("email");
        $this->fullName = $req->input("fullName");
        $this->password = $req->input("password");
    }
}
