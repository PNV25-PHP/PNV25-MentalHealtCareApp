<?php

namespace App\Models;

class User extends BaseModel
{
    private string $email;
    private string $password;
    private string $fullName;
    private string $address;
    private string $phone;
    private string $urlImage;

    /**
     * @param string $email
     * @param string $password
     * @param string $fullName
     * @param string $address
     * @param string $phone
     * @param string $urlImage
     */
    public function __construct(string $email, string $password, string $fullName, string $address, string $phone, string $urlImage)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
        $this->fullName = $fullName;
        $this->address = $address;
        $this->phone = $phone;
        $this->urlImage = $urlImage;
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

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getUrlImage(): string
    {
        return $this->urlImage;
    }

    public function setUrlImage(string $urlImage): void
    {
        $this->urlImage = $urlImage;
    }
}
