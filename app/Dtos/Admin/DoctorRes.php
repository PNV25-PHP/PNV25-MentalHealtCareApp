<?php

namespace App\Dtos\Admin;

class DoctorRes
{
    public string $password;
    public string $imageurl;
    public string $email;
    public string $fullName;
    public string $phone;
    public string $address;
    public string $specialization;
    public string $hospital;
    /**
     * @param string $
     * @param string $
     * @param string $
     * @param string $
     * @param string $
     * @param string $
     * @param string $
     * @param string $
     */
    public function __construct(string $fullName, string $email, string $password, string $phone, string $address, string $imageurl, string $specialization, string $hospital)
    {
        $this->password = $password;
        $this->imageurl = $imageurl;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->specialization = $specialization;
        $this->hospital = $hospital;
    }
}
