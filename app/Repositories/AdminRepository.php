<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Doctor;
// use App\Repositories\Doctor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
class AdminRepository
{
    public function addNewDoctor(Doctor $doctor)
    {
        $currentDateTime = Date::now();

        $userSql = "INSERT INTO users (Id, Role, Email, Password, FullName, Phone, Address, Url_Image)
                VALUES (?, 'doctor', ?, ?, ?, ?, ?, ?)";
        $hashedPassword = Hash::make($doctor->getPassword());

        $userId = DB::table('users')->insertGetId([
            'Id' => $currentDateTime,
            'Role' => 'doctor',
            'Email' => $doctor->getEmail(),
            'Password' => $hashedPassword,
            'FullName' => $doctor->getFullName(),
            'Phone' => $doctor->getPhone(),
            'Address' => $doctor->getAddress(),
            'Url_Image' => $doctor->getUrlImage(),
        ]);

        $doctorSql = "INSERT INTO doctors (Id, UserId, Specialization, Hospital)
                  VALUES (UUID(), ?, ?, ?)";
        DB::insert($doctorSql, [$userId, $doctor->specialization, $doctor->hospital]);

        // Trả về đối tượng Doctor mới tạo
        return new Doctor(
            $doctor->getEmail(),
            $doctor->getPassword(),
            $doctor->getFullName(),
            $doctor->getAddress(),
            $doctor->getPhone(),
            $doctor->getUrlImage(),
            $doctor->specialization,
            $doctor->hospital
        );
    }

    // public function updateDoctor(Doctor $doctor, $doctorId)
    // {
    //     // Lấy đối tượng Doctor cần cập nhật từ cơ sở dữ liệu
    //     $existingDoctor = DB::table('users')->where('Id', $doctorId)->first();

    //     if (!$existingDoctor) {
    //         // Xử lý khi không tìm thấy Doctor
    //         return null;
    //     }

    //     // Cập nhật thông tin trong bảng users
    //     DB::table('users')
    //         ->where('Id', $existingDoctor->getUserId())
    //         ->update([
    //             'Email' => $doctor->getEmail(),
    //             'Password' => Hash::make($doctor->getPassword()),
    //             'FullName' => $doctor->getFullName(),
    //             'Phone' => $doctor->getPhone(),
    //             'Address' => $doctor->getAddress(),
    //             'Url_Image' => $doctor->getUrlImage(),
    //         ]);

    //     // Cập nhật thông tin trong bảng doctors
    //     $existingDoctor->update([
    //         'email' => $doctor->getEmail(),
    //         'password' => Hash::make($doctor->getPassword()),
    //         'fullName' => $doctor->getFullName(),
    //         'phone' => $doctor->getPhone(),
    //         'address' => $doctor->getAddress(),
    //         'urlImage' => $doctor->getUrlImage(),
    //         'specialization' => $doctor->specialization,
    //         'hospital' => $doctor->hospital,
    //     ]);

    //     // Trả về đối tượng Doctor sau khi cập nhật
    //     return $existingDoctor;
    // }

    public function updateDoctor(Doctor $doctor)
    {
        $userSql = "UPDATE users
                SET Email = ?, FullName = ?, Phone = ?, Address = ?, Url_Image = ?
                WHERE Id = ?";
        DB::update($userSql, [
            $doctor->getEmail(),
            $doctor->getFullName(),
            $doctor->getPhone(),
            $doctor->getAddress(),
            $doctor->getUrlImage(),
            $doctor->getId(),
        ]);

        $doctorSql = "UPDATE doctors
                  SET Specialization = ?, Hospital = ?
                  WHERE Id = ?";
        DB::update($doctorSql, [
            $doctor->specialization,
            $doctor->hospital,
            $doctor->getId(),
        ]);
    }
    
    public function deleteDoctor($doctorId)
    {
        DB::table('users')
            ->where('Id', DB::table('doctors')->where('Id', $doctorId)->value('UserId'))
            ->delete();

        DB::table('doctors')->where('Id', $doctorId)->delete();
    }
}
