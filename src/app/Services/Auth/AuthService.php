<?php

namespace App\Services\Auth;

use App\DTO\AuthRegisterDTO;
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
     * @param AuthRegisterDTO $registerDTO
     * @return User
     */
    public function registerUser(AuthRegisterDTO $registerDTO): User
    {
        return $this->userRepository->create($registerDTO);
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
