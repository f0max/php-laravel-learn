<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository
{
    public function create(array $data): User
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'gender' => $data['gender'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function findByUsername(string $username): ?User
    {
        return User::where('username', $username)->first();
    }
}
