<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Doctor extends User
{
    public string $specialization;
    public string $hospital;

    public function __construct(
        string $email,
        string $password,
        string $fullName,
        string|null $address = null,
        string|null $phone = null,
        string|null $urlImage = null,
        string $specialization,
        string $hospital)
    {
        parent::__construct(new Role('doctor'), 
        $email, $password, $fullName, $address, $phone, $urlImage);
        
        $this->specialization = $specialization;
        $this->hospital = $hospital;
    }

}