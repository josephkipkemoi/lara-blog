<?php

namespace Modules\Blog\DTO;

class UpdateBlogDTO
{
    public function __construct
    (
        public string $body,
        public string $author,
        public string $title,
    )
    { }
}
