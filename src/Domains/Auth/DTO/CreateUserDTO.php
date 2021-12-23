<?php

namespace Domains\Auth\DTO;

class CreateUserDTO
{
    public function __construct(

        public string $name,

        public string $email,

        public string $password
    ){}
}
