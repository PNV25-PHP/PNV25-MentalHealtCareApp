<?php

namespace App\Dtos\Patient;

use Illuminate\Http\Request;

class DateReq
{
    public string $date;

    public function __construct(Request $req)
    {
        $this->date = $req->input("selectedDate");
    }
}
