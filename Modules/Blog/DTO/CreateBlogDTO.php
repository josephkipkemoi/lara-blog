<?php

namespace Modules\Blog\DTO;


class CreateBlogDTO
{
    public function __construct
    (
        public string $title,

        public string $body,

        public string $author,

        public int $user_id,
    ){}
}
