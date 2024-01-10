<?php

namespace App\Models;

class Post extends BaseModel
{
    public string $userid;
    private string $Content;
    private string $Image;
    // private string $CreateAt;
    /**
     * @param string $userid
     */
    public function __construct(string $userid, string $Content, string $Image) //, string $CreateAt
    {
        parent::__construct();
        $this->userid = $userid;
        $this->Content = $Content;
        $this->Image = $Image;
        // $this->CreateAt = $CreateAt;
    }

    public function getUserId(): string
    {
        return $this->userid;
    }

    public function getContent(): string
    {
        return $this->Content;
    }

    public function getImage(): string
    {
        return $this->Image;
    }
}
