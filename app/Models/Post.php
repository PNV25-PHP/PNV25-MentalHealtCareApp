<?php

namespace App\Models;

class Post extends BaseModel
{
    public string $userid;
    private string $Content;
    private string $Url_Image;
    private string $CreateAt;
    /**
     * @param string $userid
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

    public function getContent(): string
    {
        return $this->Content;
    }

    public function getUrl_Image(): string
    {
        return $this->Url_Image;
    }
    
    public function getCreateAt(): string
    {
        return $this->CreateAt;
    }

}
