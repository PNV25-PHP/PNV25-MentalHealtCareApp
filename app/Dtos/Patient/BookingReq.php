<?php

namespace App\Dtos\Patient;

use Illuminate\Http\Request;

class BookingReq
{
    public string $date;
    public string $patientId;
    public string $doctorId;
    public string $time;
    public string $price;

    public function __construct(Request $req)
    {
        $this->date = $req->input("selectedDate");
        $this->patientId = $req->input("patientId");
        $this->doctorId = $req->input("doctorId");
        $this->time = $req->input("time");
        $this->price = $req->input("prices");
    }
}
