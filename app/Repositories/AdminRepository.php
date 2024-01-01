<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminRepository
{
    private string $tableName = "admins";

    public function insert(Admin $admin)
    {
        $sql = "INSERT INTO $this->tableName (ID, UserId) VALUES (?, ?)";

        // Truyền các giá trị vào placeholder
        DB::insert($sql, [
            $admin->getId(),
            $admin->getUserId(),
        ]);
    }

    public function selectAll()
    {
        $admins = "SELECT * FROM admins";

        return $admins;
    }



    public function addDoctor(User $user, string $specialization, string $hospital)
    {
        $userSql = "INSERT INTO users (Id, Role, Email, Password, FullName, Phone, Address, Url_Image)
                VALUES (UUID(), 'doctor', ?, ?, ?, ?, ?, ?)";
        $hashedPassword = Hash::make($user->getPassword());
        $userId = DB::insertGetId($userSql, [
            $user->getEmail(),
            $hashedPassword,
            $user->getFullName(),
            $user->getPhone(),
            $user->getAddress(),
            $user->getUrlImage(),
        ]);

        $doctorSql = "INSERT INTO doctors (Id, UserId, Specialization, Hospital)
                  VALUES (UUID(), ?, ?, ?)";
        DB::insert($doctorSql, [$userId, $specialization, $hospital]);
    }

    public function editDoctor(User $user, string $specialization, string $hospital)
    {
        $userSql = "UPDATE users
                SET Email = ?, FullName = ?, Phone = ?, Address = ?, Url_Image = ?
                WHERE Id = (SELECT UserId FROM doctors WHERE Id = ?)";
        DB::update($userSql, [
            $user->getEmail(),
            $user->getFullName(),
            $user->getPhone(),
            $user->getAddress(),
            $user->getUrlImage(),
            $user->getId(),
        ]);

        $doctorSql = "UPDATE doctors
                  SET Specialization = ?, Hospital = ?
                  WHERE Id = ?";
        DB::update($doctorSql, [$specialization, $hospital, $user->getId()]);
    }

    public function deleteDoctor($doctorId)
    {
        $userSql = "DELETE FROM users
                WHERE Id = (SELECT UserId FROM doctors WHERE Id = ?)";
        DB::delete($userSql, [$doctorId]);
        $doctorSql = "DELETE FROM doctors
                  WHERE Id = ?";
        DB::delete($doctorSql, [$doctorId]);
    }

}
