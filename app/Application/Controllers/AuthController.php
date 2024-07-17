<?php

namespace App\Application\Controllers;

use App\Domains\Interfaces\Services\IAuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController
{

    private IAuthService $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request): JsonResponse
    {
        $result = $this->authService->login($request);

        if (!$result->isSuccess()) {
            return response()->json($result->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json($result->toArray(), Response::HTTP_OK);
    }


    public function logout(Request $request): JsonResponse
    {
        $result = $this->authService->logout($request);

        if (!$result->isSuccess()) {
            return response()->json($result->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json($result->toArray(), Response::HTTP_OK);
    }
}
