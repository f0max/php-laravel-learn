<?php

namespace App\Repositories\User;

use App\DTO\AuthRegisterDTO;
use App\Models\User;

class UserRepository
{
    public function create(AuthRegisterDTO $registerDTO): User
    {
        return User::create([
            'username' => $registerDTO->username,
            'email' => $registerDTO->email,
            'last_name' => $registerDTO->last_name,
            'first_name' => $registerDTO->first_name,
            'gender' => $registerDTO->gender,
            'password' => bcrypt($registerDTO->password),
        ]);
    }

    public function findByUsername(string $username): ?User
    {
        return User::where('username', $username)->first();
    }
}
