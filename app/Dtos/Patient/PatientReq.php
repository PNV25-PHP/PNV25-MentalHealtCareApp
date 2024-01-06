<?php

namespace App\Dtos\Patient;

use Illuminate\Http\Request;

class PatientReq
{
  public string $email;
  public string $password;
  public string $fullName;
  public string $phone;
  public string $address;
  public string $imageurl;

  public function __construct(Request $req)
    {
      $this->password = $req->input('password');
      $this->imageurl = $req->input('image');
      $this->email = $req->input('email');
      $this->fullName = $req->input('fullName');
      $this->phone = $req->input('phone');
      $this->address = $req->input('address');
    }

    
}
