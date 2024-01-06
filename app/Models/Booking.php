<?php
namespace App\Models;
class Booking extends BaseModel
{
    public string $date;
    public string $patientId;
    public string $doctorId;
    public string $time;
    public string $price;

    /**
     * @param string $userid
     */
    public function __construct(string $patientId, string $doctorId, string $time, string $date, string $price)
    {
        parent::__construct();
        $this->patientId = $patientId;
        $this->doctorId = $doctorId;
        $this->time = $time;
        $this->date = $date;
        $this->price = $price;
    }

    public function getPatientId(): string
    {
        return $this->patientId;
    }

    public function getDocterId(): string
    {
        return $this->doctorId;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getPrice(): string
    {
        return $this->price;
    }
}