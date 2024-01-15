<?php

namespace App\Dtos\Patient;

class NewPostRes
{
    public string $id;
    public string $userid;
    public string $content;
    public string $image;

    /**
     * @param string $userid
     * @param string $conten
     * @param string $image
     */
    public function __construct(string $userid, string $content, string $image)
    {
        // $this->id = $id;
        $this->userid = $userid;
        $this->content = $content;
        $this->image = $image;
    }
}
