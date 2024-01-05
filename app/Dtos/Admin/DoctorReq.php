<?php

namespace App\Dtos\Admin;

use Illuminate\Http\Request;

class DoctorReq
{
  public string $email;
  public string $password;
  public string $fullName;
  public string $phone;
  public string $address;
  public string $specialization;
  public string $hospital;
  public string $imageurl;

  public function __construct(Request $req)
    {
      $this->password = $req->input('password');
      $this->imageurl = $req->input('image');
      $this->email = $req->input('email');
      $this->fullName = $req->input('fullName');
      $this->phone = $req->input('phone');
      $this->address = $req->input('address');
      $this->specialization = $req->input('specialization');
      $this->hospital = $req->input('hospital');
    }

    
}
