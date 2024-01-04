<?php

namespace App\Repositories;

use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorRepository
{
    private string $tableName = "doctors";

    public function insert(Doctor $doctor)
    {
        $sql = "INSERT INTO $this->tableName (ID, UserId) VALUES (?, ?)";

        DB::insert($sql, [
            $doctor->getId(),
            $doctor->getId(),
        ]);
    }

    public function getDoctorById($doctorId)
    {
        $sql = "SELECT doctors.*, users.Email, users.FullName, users.Phone, users.Address, users.Url_Image
            FROM doctors
            JOIN users ON doctors.UserId = users.Id
            WHERE doctors.Id = ?";
            $doctor = DB::selectOne($sql, [$doctorId]);
            $result = DB::select($sql);

        if (!empty($result)) {
            // Lấy mảng đầu tiên từ kết quả
            $data = $result[0];

            // Tạo đối tượng Doctor từ mảng
            $doctor = new Doctor(
                $data->Email,
                $data->Password,
                $data->FullName,
                $data->Address,
                $data->Phone,
                null, // Không có thông tin Url_Image trong kết quả
                $data->Specialization,
                $data->Hospital
            );

            // Đặt UserId bằng giá trị từ mảng
            $doctor->setUserId($data->UserId);

            return $doctor;
        }

        return null;
        
    }

    public function getAllDoctor()
    {
        $sql = "SELECT doctors.*, users.Email, users.FullName, users.Phone, users.Address, users.Url_Image
            FROM doctors
            JOIN users ON doctors.UserId = users.Id";
        return DB::select($sql);
    }
    
}
