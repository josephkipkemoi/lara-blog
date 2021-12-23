<?php

namespace Domains\Tag\DTO;

class CreateTagDTO
{
    public function __construct(
        public string $tag,
    ){}
}
