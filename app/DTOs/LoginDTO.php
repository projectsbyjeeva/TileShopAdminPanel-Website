<?php

namespace App\DTOs;

class LoginDTO
{
    public function __construct(
        public string $name,
        public string $password,
    ) {}
}
