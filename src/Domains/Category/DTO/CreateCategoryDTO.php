<?php

namespace Domains\Category\DTO;

class CreateCategoryDTO
{
    public function __construct(
        public string $category,
    )
    {}
}
