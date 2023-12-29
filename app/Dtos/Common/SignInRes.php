<?php

namespace App\Dtos\Common;

class SignInRes
{
    public string $id;
    public string $role;
    public string $email;
    public string $fullName;

    /**
     * @param string $id
     * @param string $role
     * @param string $email
     * @param string $fullName
     */
    public function __construct(string $id, string $role, string $email, string $fullName)
    {
        $this->id = $id;
        $this->role = $role;
        $this->email = $email;
        $this->fullName = $fullName;
    }
}
