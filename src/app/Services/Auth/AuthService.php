<?php

namespace App\Services\Auth;

use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use App\Models\User;

class AuthService
{
    public function __construct(
        protected UserRepository $userRepository
    )
    {
    }

    /**
     * @param array $data
     * @return User
     */
    public function registerUser(array $data): User
    {
        return $this->userRepository->create($data);
    }

    /**
     * @param array $credentials
     * @return string
     * @throws AuthenticationException
     */
    public function loginUser(array $credentials): string
    {
        if (!Auth::attempt($credentials)) {
            throw new AuthenticationException('Invalid login credentials');
        }

        $user = $this->userRepository->findByUsername($credentials['username']);

        return $user->createToken('auth_token')->plainTextToken;
    }

    /**
     * @param User $user
     * @return void
     */
    public function logoutUser(User $user): void
    {
        $user->currentAccessToken()->delete();
    }
}
