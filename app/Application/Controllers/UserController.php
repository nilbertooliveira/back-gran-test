<?php

namespace App\Application\Controllers;

use App\Domains\Interfaces\Services\IUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController
{

    private IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        return response()->json($request->user()->toArray());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $result = $this->userService->store($request);

        if (!$result->isSuccess()) {
            return response()->json($result->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json($result->toArray(), Response::HTTP_OK);
    }
}
