<?php

namespace App\Dtos\Common;

class SignInRes
{
    private string $id;
    private string $role;
    private string $email;
    private string $fullName;

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

    public function getId(): string
    {
        return $this->id;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }
}
