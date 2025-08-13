<?php

namespace App\DTO;

readonly class AuthRegisterDTO
{
    public function __construct(
        public string $username,
        public string $email,
        public string $last_name,
        public string $first_name,
        public string $gender,
        public string $password
    )
    {
    }
}
