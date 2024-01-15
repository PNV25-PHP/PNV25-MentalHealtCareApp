<?php

namespace App\Dtos\Patient;

class PatientRes
{
    public string $password;
    public string $imageurl;
    public string $email;
    public string $fullName;
    public string $phone;
    public string $address;
    /**
     * @param string $
     * @param string $
     * @param string $
     * @param string $
     * @param string $
     * @param string $
     */
    public function __construct(string $fullName, string $email, string $password, string $phone, string $address, string $imageurl)
    {
        $this->password = $password;
        $this->imageurl = $imageurl;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }
}
