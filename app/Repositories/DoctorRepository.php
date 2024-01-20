<?php

namespace App\Repositories;

use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorRepository
{
    private string $tableName = "doctors";

    public function insert_doctor(Doctor $doctor)
    {
        $sql = "INSERT INTO $this->tableName (ID, UserId, Specialization, Hospital) VALUES (?, ?, ?, ?)";
        DB::insert($sql, [
            $doctor->getId(),
            $doctor->getId(),
            $doctor->specialization,
            $doctor->hospital
        ]);
    }

    // public function getAllDoctor()
    // {
    //     $sql = "SELECT doctors.*, users.Email, users.FullName, users.Phone, users.Address,users.Url_Image, users.Password
    //         FROM doctors
    //         JOIN users ON doctors.UserId = users.Id";
    //     return DB::select($sql);
    // private string $tableName = "patients";

    // public function insert(Doctor $doctor)
    // {
    //     $sql = "INSERT INTO $this->tableName (ID, UserId) VALUES (?, ?)";

    //     // Truyền các giá trị vào placeholder
    //     DB::insert($sql, [
    //         $doctor->getId(),
    //         $doctor->getUserId(),

    //     ]);
    // }

    public function getAllTimeDoctor()
    {
        $query = "SELECT time FROM listtimedoctor";
        $result = DB::select($query);
        return $result;
    }

    public function getAvailableTimesForBooking($selectedDate)
    {
        $query = "SELECT listtimedoctor.id, listtimedoctor.time, listtimedoctor.price
                  FROM listtimedoctor
                  LEFT JOIN booking ON listtimedoctor.id = booking.TimeId AND booking.DateBooking = ?
                  WHERE booking.TimeId IS NULL";
        $result = DB::select($query, [$selectedDate]);
        return $result;
    }


    public function getAllDoctor()
    {
        $query = "SELECT  users.Id AS UserId,users.Id,users.Email,users.FullName,users.Phone,users.Password,
                     users.Address, users.Url_Image,doctors.Specialization,doctors.Hospital
            FROM users
            JOIN doctors ON users.Id = doctors.UserId
            WHERE users.Role = 'doctor'    ";
        $result = DB::select($query);
        return $result;
    }

    public function getDoctorById(string $id)
    {
        $query = "SELECT  users.Id AS UserId,users.Email,users.FullName,users.Phone,
                     users.Address, users.Url_Image,doctors.Specialization,doctors.Hospital
            FROM users
            JOIN doctors ON users.Id = doctors.UserId
            WHERE users.Role = 'doctor' AND users.Id = '$id'    ";
        $result = DB::select($query);
        return $result;
    }
}
