<?php

namespace App\Repositories;

use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorRepository
{
    private string $tableName = "patients";

    public function insert(Doctor $doctor)
    {
        $sql = "INSERT INTO $this->tableName (ID, UserId) VALUES (?, ?)";

        DB::insert($sql, [
            $doctor->getId(),
            $doctor->getUserId(),

        ]);
    }

    public function selectAll()
    {
        $doctors = DB::select("SELECT * FROM doctors");
        return $doctors;
    }

    public function getDoctorById($doctorId)
    {
        $sql = "SELECT doctors.*, users.Email, users.FullName, users.Phone, users.Address, users.Url_Image
            FROM doctors
            JOIN users ON doctors.UserId = users.Id
            WHERE doctors.Id = ?";
        return DB::selectOne($sql, [$doctorId]);
    }

    public function getAllDoctors()
    {
        $sql = "SELECT doctors.*, users.Email, users.FullName, users.Phone, users.Address, users.Url_Image
            FROM doctors
            JOIN users ON doctors.UserId = users.Id";
        return DB::select($sql);
    }
    
}
