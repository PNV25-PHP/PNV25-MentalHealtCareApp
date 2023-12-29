<?php

namespace App\Dtos\Common;

use Illuminate\Http\Request;

class SignInReq
{
    private string $email;
    private string $password;

    public function __construct(Request $request)
    {
        $this->email = $request->input("email");
        $this->password = $request->input("password");
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
