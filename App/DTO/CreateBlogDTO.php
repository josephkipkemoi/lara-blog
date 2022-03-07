<?php

namespace App\DTO;

class CreateBlogDTO 
{
    public function __construct(
        public string $featured,

        public int $blog_title,
    
        public string $category,
    
        public string $title,
    
        public string $author,
    
        public string $body,
    
        public string $image,
    
        public string $tag,
    ){}   
}