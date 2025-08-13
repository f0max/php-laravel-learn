<?php

namespace App\Http\Controllers\Auth;

use App\Factory\AbstractDTOFactoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\User\UserResource;
use App\Services\Auth\AuthService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService,
        protected AbstractDTOFactoryInterface $dtoFactory
    )
    {
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $dto = $this->dtoFactory->makeAuthRegister(
            $request->getUsername(),
            $request->getEmail(),
            $request->getLastName(),
            $request->getFirstName(),
            $request->getGender(),
            $request->getPassword()
        );

        $user = $this->authService->registerUser($dto);

        return response()->json([
           'data' => new UserResource($user)
        ]);
    }

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     * @throws AuthenticationException
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        $token = $this->authService->loginUser($credentials);

        return response()->json([
            'data' => $token
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $this->authService->logoutUser($request->user());

        return response()->json([
            'data' => 'Successfully logged out'
        ]);
    }
}
