<?php

namespace App\Factory;

use App\DTO\AuthRegisterDTO;

class AbstractDTOFactory implements AbstractDTOFactoryInterface
{
    public function makeAuthRegister(
        string $username,
        string $email,
        string $last_name,
        string $first_name,
        string $gender,
        string $password
    ): AuthRegisterDTO
    {
        return new AuthRegisterDTO(
            $username, $email, $last_name, $first_name, $gender, $password
        );
    }
}
