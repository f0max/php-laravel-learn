<?php

namespace App\Factory;

use App\DTO\AuthRegisterDTO;

interface AbstractDTOFactoryInterface
{
    public function makeAuthRegister(
        string $username,
        string $email,
        string $last_name,
        string $first_name,
        string $gender,
        string $password
    ): AuthRegisterDTO;
}
