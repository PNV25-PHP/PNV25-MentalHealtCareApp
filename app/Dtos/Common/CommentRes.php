<?php

namespace App\Dtos\Common;

class CommentRes
{
    public string $PostId;
    public string $UserId;
    public string $CommentContent;

    /**
     * @param string $PostId
     * @param string $UserId
     * @param string $CommentContent
     */
    public function __construct(string $PostId, string $UserId, string $CommentContent)
    {
        $this->PostId = $PostId;
        $this->UserId = $UserId;
        $this->CommentContent = $CommentContent;
    }
}
