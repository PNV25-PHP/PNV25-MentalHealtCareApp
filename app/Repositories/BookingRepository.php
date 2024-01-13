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
    public function get_patient_id($email)
    {
        $user = DB::select('SELECT Id FROM users WHERE Email = ? LIMIT 1', [$email]);

        if (!empty($user)) {
            $userId = $user[0]->Id;

            $patient = DB::select('SELECT Id FROM patients WHERE UserId = ?', [$userId]);

            if (!empty($patient)) {
                $patientId = $patient[0]->Id;
                $bookings = DB::select('SELECT * FROM booking WHERE PatientId = ?', [$patientId]);
                if (!empty($bookings)) {
                    $bookings = DB::select("SELECT b.*, u.email, u.fullname, u.phone
                    FROM booking b  
                    INNER JOIN users u ON b.DoctorId = u.Id
                    WHERE b.PatientId = ?", [$patientId]);
                    return $bookings;
                } else {
                    return "Không tìm thấy bản ghi trong bảng bookings";
                }
            } else {
                return "Không tìm thấy bản ghi trong bảng patients";
            }
        } else {
            return "Không tìm thấy người dùng với email này";
        }
    }
}
