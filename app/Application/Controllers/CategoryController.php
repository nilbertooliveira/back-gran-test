<?php

namespace App\Application\Controllers;

use App\Application\Requests\StoreCategoryRequest;
use App\Domains\Interfaces\Services\ICategoryService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CategoryController
{

    private ICategoryService $categoryService;

    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse
    {
        $result = $this->categoryService->findAll();

        if (!$result->isSuccess()) {
            return response()->json($result->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json($result->toArray(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $result = $this->categoryService->store($request);

        if (!$result->isSuccess()) {
            return response()->json($result->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json($result->toArray(), Response::HTTP_OK);
    }

    public function show(int $id): JsonResponse{
        $result = $this->categoryService->show($id);

        if (!$result->isSuccess()) {
            return response()->json($result->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json($result->toArray(), Response::HTTP_OK);
    }
}
