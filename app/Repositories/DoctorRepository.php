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

    public function getAllDoctor()
    {
        $sql = "SELECT doctors.*, users.Email, users.FullName, users.Phone, users.Address,users.Url_Image, users.Password
            FROM doctors
            JOIN users ON doctors.UserId = users.Id";
        return DB::select($sql);
    }
    
}
