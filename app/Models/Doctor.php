<?php

namespace App\Models;

class Doctor extends BaseModel
{
    public string $userid;
    public string $specialization;
    public string $hospital;
    /**
     * @param string $userid
     * @throws \Exception
     */
    public function __construct(string $userid, string $specialization, string $hospital)
    {
        parent::__construct();
        $this->userid = $userid;
        $this->specialization = $specialization;
        $this->hospital = $hospital;
    }
    public function getUserId(): string
    {
        return $this->userid;
    }
    public function getHospital(): string
    {
        return $this->hospital;
    }
    public function getSpecialization(): string
    {
        return $this->specialization;
    }
}