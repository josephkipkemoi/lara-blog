<?php

namespace Modules\Comment\DTO;

class UpdateCommentDTO
{
    public function __construct(
        public string $comment_body
    ){}
}
