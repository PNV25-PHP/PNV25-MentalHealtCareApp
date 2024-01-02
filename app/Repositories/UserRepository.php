<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    private string $tableName = "users";

    // public function insert(User $user)
    // {
    //     DB::insert(
    //         "insert into $this->tableName (ID, Role, Email, Password)",
    //         [$user->id, $user->role, $user->email, $user->password]
    //     );
    // }

    public function insert(User $user)
    {
        $sql = "INSERT INTO $this->tableName (ID, Role, FullName, Email, Password) VALUES (?, ?, ?, ?, ?)";

        // Truyền các giá trị vào placeholder
        $success = DB::insert($sql, [
            $user->getId(),
            $user->getRole()->getValue(),
            $user->getFullname(),
            $user->getEmail(),
            $user->getPassword(),
        ]);

        if ($success) {
            // If the insertion was successful, return the user instance
            return $user;
        }

        // If the insertion failed, you might want to handle it accordingly
        return null;
    }



    public function selectAll()
    {
        $users = "SELECT * FROM users";

        return $users;
    }

    public function update(User $model)
    {
        // TODO: Implement Update() method.
    }

    public function delete(string $id)
    {
        // TODO: Implement Delete() method.
    }

    public function findByEmail($email)
    {
        $result = DB::select("SELECT * FROM users WHERE email = ? LIMIT 1", [$email]);

        if (!empty($result)) {
            $newUser = $result[0];
            if ($newUser->Role == "Admin") {
                $role = Role::Admin;
            } elseif ($newUser->Role == "Doctor") {
                $role = Role::Doctor;
            } else {
                $role = Role::Patient;
            }
            return new User($role, $newUser->Email, $newUser->Password, $newUser->FullName, $newUser->Phone == null ? "" : $newUser->Phone, $newUser->Address == null ? "" : $newUser->Address, $newUser->Url_Image == null ? "" : $newUser->Url_Image);
        }

        return null;
    }

    public function updateUser(User $user)
    {
        $id = $user->getId();
        $role = $user->getRole()->getValue();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $fullname = $user->getFullname();
        $phone = $user->getPhone();
        $address = $user->getAddress();
        $url_image = $user->getUrlImage();
        $query = DB::update("UPDATE users SET role = ?, password = ?, fullname = ?, phone = ?, address = ?, url_image = ? WHERE email = ?", [$role, $password, $fullname, $phone, $address, $url_image, $email]);
        return $query;
    }
}
