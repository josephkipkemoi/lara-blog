<?php

namespace Modules\Category\DTO;

class CreateCategoryDTO
{
    public function __construct(
        public string $category,
    )
    {}
}
