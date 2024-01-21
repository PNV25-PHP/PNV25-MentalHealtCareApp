<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use PharIo\Manifest\Url;

class AdminRepository
{
    // for doctors
    public function addNewDoctor(User $doctor)
    {
        $userSql = "INSERT INTO users (Id, Role, Email, Password, FullName, Phone, Address, Url_Image)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $doctor = DB::insert($userSql, [
            $doctor->getId(),
            $doctor->getRole()->getValue(),
            $doctor->getEmail(),
            $doctor->getPassword(),
            $doctor->getFullName(),
            $doctor->getPhone(),
            $doctor->getAddress(),
            $doctor->getUrlImage()
        ]);
        return $doctor;
    }

    public function updateDoctor(User $user, Doctor $doctor)
    {
        $userSqldoctor = "UPDATE doctors
        SET Specialization = ?, Hospital = ?
        WHERE UserId = ?";

        $userSql = "UPDATE users
        SET FullName = ?, Password = ?, Phone = ?, Address = ?, Url_Image = ?, Email = ?
        WHERE Id = ?";

        $userSql = DB::update($userSql, [
            $user->getFullName(),
            $user->getPassword(),
            $user->getPhone(),
            $user->getAddress(),
            $user->getUrlImage(),
            $user->getEmail(),
            $doctor->getUserId()
        ]);


        DB::update($userSqldoctor, [
            $doctor->getSpecialization(),
            $doctor->getHospital(),
            $doctor->getUserId(),
        ]);
        return $userSql;
    }

    public function deleteDoctor($doctorId)
    {
        $userId = DB::table('doctors')->where('Id', $doctorId)->value('UserId');

        DB::table('doctors')->where('Id', $doctorId)->delete();
        DB::table('users')->where('Id', $userId)->delete();
    }

    // for patients
    public function addNewPatient(User $patient)
    {
        $userSql = "INSERT INTO users (Id, Role, Email, Password, FullName, Phone, Address, Url_Image)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $patient = DB::insert($userSql, [
            $patient->getId(),
            $patient->getRole()->getValue(),
            $patient->getEmail(),
            $patient->getPassword(),
            $patient->getFullName(),
            $patient->getPhone(),
            $patient->getAddress(),
            $patient->getUrlImage()
        ]);
        return $patient;
    }

    public function updatePatient(User $patient)
    {
        $userSql = "UPDATE users
                SET FullName = ?, Password = ?, Phone = ?, Address = ?
                WHERE Email = ?";
        DB::update($userSql, [
            $patient->getFullName(),
            $patient->getPassword(),
            $patient->getPhone(),
            $patient->getAddress(),
            $patient->getEmail(),
        ]);
        return $patient;
    }

    public function deletePatient($patientID)
    {
        // Lấy UserId từ bảng patients
        $userId = DB::table('patients')->where('Id', $patientID)->value('UserId');

        // Xóa hàng trong bảng patients
        DB::table('patients')->where('Id', $patientID)->delete();

        // Xóa hàng trong bảng users
        DB::table('users')->where('Id', $userId)->delete();
    }
    // manager booking

    public function getAllBooking()
    {
        $sql = " SELECT booking.Id AS ID, listtimedoctor.time AS time, booking.DateBooking AS datebooking , listtimedoctor.price AS Price ,
        patient_users.FullName AS PatientFullName, 
        doctor_users.FullName AS DoctorFullName, doctor_users.Phone AS DoctorPhone
        FROM booking
        JOIN patients ON booking.PatientId = patients.Id
        JOIN users AS patient_users ON patients.UserId = patient_users.Id
        JOIN doctors ON booking.DoctorId = doctors.Id
        JOIN users AS doctor_users ON doctors.UserId = doctor_users.Id
        JOIN listtimedoctor ON listtimedoctor.id= booking.TimeId
        ";
        return DB::select($sql);
    }
    // manager dashboard

    // Thêm hàm truy vấn số lượng đặt hàng cho từng bác sĩ
    function getBookingCountByDoctor()
    {
        $sql = "SELECT doctors.Id, COUNT(booking.Id) AS BookingCount, doctor_users.FullName AS doctorFullName
    FROM doctors
    LEFT JOIN booking ON doctors.Id = booking.DoctorId
    JOIN users AS doctor_users ON doctors.UserId = doctor_users.Id
    GROUP BY doctors.Id;
    ";
        return DB::select($sql);
    }
}
