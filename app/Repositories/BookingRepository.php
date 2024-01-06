<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Patient;
use App\Models\Booking;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use SebastianBergmann\Environment\Console;

class BookingRepository
{
    //private string $tableName = "booking"; 

    // public function insert(Booking $booking)
    // {
    //     $sql = "INSERT INTO $this->tableName (Id,PatientId,DoctorId,TimeBooking,DateBooking,TotalPrice) VALUES (?, ?, ?, ?, ?, ?)";
    //     DB::insert($sql, [
    //         $booking->getId(),
    //         $booking->getPatientId(),
    //         $booking->getDocterId(),
    //         $booking->getTime(),
    //         $booking->getDate(),
    //         $booking->getPrice()
    //     ]);
    // }

    // public function selectAll($patientId)
    // {
    //     $bookings = DB::select("SELECT * FROM booking WHERE PatientId = ?", [$patientId]);
    //     foreach ($bookings as $booking) {
    //         $findDoctor = Doctor::find('1');  // Gọi find() một cách tĩnh    
    //         $name = $findDoctor->name;
    //         $email = $findDoctor->email;
    //         $phone = $findDoctor->phone;
    //     }
    //     $newBooking = $bookings[0];
    //     return new Booking($newBooking->$name, $newBooking->$email, $newBooking->$phone, $newBooking->TimeBooking, $newBooking->DateBooking, $newBooking->TotalPrice);
    // }
    // public function selectAll($patientId)
    // {
    //lấy user.id từ email đã có
    //Link tới bảng patients và dựa vào đó lấy patient.id
    //Lấy patientid
    // $bookings = DB::select("SELECT b.*, u.email, u.fullname, u.phone
    //     FROM booking b
    //     INNER JOIN users u ON b.DoctorId = u.Id
    //     WHERE b.PatientId = ?", [$patientId]);
    // echo 
    // return $bookings;
    // }

    function get_patient_id($email)
    {
        dd($email);
        $user = DB::select('SELECT Id FROM users WHERE Email = ?', [$email]);

        if (!empty($user)) {
            $userId = $user[0]->Id;

            $patient = DB::select('SELECT Id FROM patients WHERE UserId = ?', [$userId]);

            if (!empty($patient)) {
                $patientId = $patient[0]->Id;
                $bookings = DB::select('SELECT * FROM booking WHERE PatientId = ?', [$patientId]);
                // echo "Patient ID: " . $booking;
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
