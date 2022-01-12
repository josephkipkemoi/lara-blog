<?php

namespace Modules\Tag\DTO;

class CreateTagDTO
{
    public function __construct(
        public string $tag,
    ){}
}
