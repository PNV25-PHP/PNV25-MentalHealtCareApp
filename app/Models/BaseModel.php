<?php 
namespace App\Models;

use DateTime;
use DateTimeZone;

abstract class BaseModel
{
    public string $id;
    public string $createdAt;

    /**
     * BaseModel constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->id = $this->generateId();
        $this->createdAt = $this->generateTimestamp();
    }

    public function getId(): string
    {
        return $this->createdAt;
    }

    protected function generateId(): string
    {
        return date('Y-m-d H:i:s');
    }

    protected function generateTimestamp(): string
    {
        return (new DateTime('now', new DateTimeZone('Europe/London')))->getTimestamp();
    }
}