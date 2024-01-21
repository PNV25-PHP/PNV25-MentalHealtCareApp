<?php

namespace App\Repositories;

use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingRepository
{
    private string $tableName = "booking";

    public function insert(Booking $booking)
    {
        $sql = "INSERT INTO $this->tableName (Id,PatientId,DoctorId,DateBooking,TimeId) VALUES (?, ?, ?, ?, ?)";
        DB::insert($sql, [
            $booking->getId(),
            $booking->getPatientId(),
            $booking->getDocterId(),
            $booking->getDate(),
            $booking->getTimeId()
        ]);
    }

    public function selectAll()
    {
        $bookings = "SELECT * FROM $this->tableName";

        return $bookings;
    }

    public function get_patient_id($email)
    {
        $user = DB::select('SELECT Id FROM users WHERE Email = ? LIMIT 1', [$email]);

        if (!empty($user)) {
            $userId = $user[0]->Id;

            $patient = DB::select('SELECT Id FROM patients WHERE UserId = ?', [$userId]);

            if (!empty($patient)) {
                $patientId = $patient[0]->Id;

                $bookings = DB::select('SELECT b.Id, b.PatientId, b.DoctorId, b.DateBooking, b.TimeId, u.Email, u.Fullname, u.Phone, t.time, t.price
                FROM booking b  
                INNER JOIN doctors d ON b.DoctorId = d.Id
                INNER JOIN users u ON d.UserId = u.Id
                INNER JOIN listTimeDoctor t ON b.TimeId = t.id
                WHERE b.PatientId = ?', [$patientId]);

                if (!empty($bookings)) {
                    return $bookings;
                } else {
                    return "No record found in booking table";
                }
            } else {
                return "No records found in patients table";
            }
        } else {
            return "No user found with this email";
        }
    }
}
