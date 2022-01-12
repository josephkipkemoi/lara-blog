<?php

namespace Modules\Comment\DTO;

class CreateCommentDTO
{
    public function __construct(

        public string $comment_body,

        public int $user_id,

        public int $blog_id,
    )
    {}
}
