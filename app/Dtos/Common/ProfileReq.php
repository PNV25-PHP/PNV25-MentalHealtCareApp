<?php

namespace App\Dtos\Common;

use Illuminate\Http\Request;

class ProFileReq
{
    public string $id;
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
        $this->id = $request->input("id");
        $this->role = $request->input("role");
        $this->email = $request->input("email");
        $this->password = $request->input("password");
        $this->fullname = $request->input("fullname");
        $this->phone = $request->input("phone");
        $this->address = $request->input("address");
        $this->url_image = $request->input("url_image");
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getFullname(): string
    {
        return $this->fullname;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getUrlImage(): string
    {
        return $this->url_image;
    }

    public function setUrlImage(string $url_image): void
    {
        $this->url_image = $url_image;
    }
}
