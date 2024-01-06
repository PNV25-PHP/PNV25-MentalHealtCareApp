<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public string $userid;

    /**
     * @param string $userid
     * @throws \Exception
     */
    public function __construct(string $userid)
    {
        parent::__construct();
        $this->userid = $userid;
    }
    public function getUserId(): string
    {
        return $this->userid;
    }
    
}
