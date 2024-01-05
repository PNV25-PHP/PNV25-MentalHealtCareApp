<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use PharIo\Manifest\Url;

class AdminRepository
{
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

    public function updateDoctor(User $doctor)
    {
        $userSql = "UPDATE users
                SET FullName = ?, Password = ?, Phone = ?, Address = ?
                WHERE Email = ?";
        DB::update($userSql, [
            $doctor->getFullName(),
            $doctor->getPassword(),
            $doctor->getPhone(),
            $doctor->getAddress(),
            $doctor->getEmail(),
        ]);
        return $doctor;
    }

    public function deleteDoctor($doctorId)
    {
        $userId = DB::table('doctors')->where('Id', $doctorId)->value('UserId');

        DB::table('doctors')->where('Id', $doctorId)->delete();
        DB::table('users')->where('Id', $userId)->delete();
    }
}
