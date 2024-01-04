<?php

namespace App\Repositories;

use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingRepository
{
    private string $tableName = "booking";

    public function insert(Booking $booking)
    {
        $sql = "INSERT INTO $this->tableName (Id,PatientId,DoctorId,TimeBooking,DateBooking,TotalPrice) VALUES (?, ?, ?, ?, ?, ?)";
        DB::insert($sql, [
            $booking->getId(),
            $booking->getPatientId(),
            $booking->getDocterId(),
            $booking->getTime(),
            $booking->getDate(),
            $booking->getPrice()
        ]);
    }

    public function selectAll()
    {
        $bookings = "SELECT * FROM $this->tableName";

        return $bookings;
    }
}
