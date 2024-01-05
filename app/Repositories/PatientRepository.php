<?php

namespace App\Repositories;

use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PatientRepository
{
    private string $tableName = "patients";

    public function insert(Patient $patient)
    {
        $sql = "INSERT INTO $this->tableName (ID, UserId) VALUES (?, ?)";
        DB::insert($sql, [
            $patient->getId(),
            $patient->getId(),
        ]);
    }

    public function getAllDoctor()
    {
        $sql = "SELECT patients.*, users.Email, users.FullName, users.Phone, users.Address,users.Url_Image, users.Password
            FROM patients
            JOIN users ON patients.UserId = users.Id";
        return DB::select($sql);
    }
}
