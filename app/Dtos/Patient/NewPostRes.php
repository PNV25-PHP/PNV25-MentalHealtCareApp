<?php

namespace App\Dtos\Patient;

class NewPostRes
{
    public string $id;
    public string $userid;
    public string $conten;
    public string $image;

    /**
     * @param string $id
     * @param string $userid
     * @param string $conten
     * @param string $image
     */
    public function __construct(string $id, string $userid, string $conten, string $image)
    {
        $this->id = $id;
        $this->userid = $userid;
        $this->conten = $conten;
        $this->image = $image;
    }
}
