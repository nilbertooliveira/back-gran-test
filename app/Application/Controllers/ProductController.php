<?php

namespace App\Application\Controllers;

use App\Application\Commands\AddProductCase;
use App\Application\Handlers\AddProductHandler;
use App\Application\Requests\StoreProductRequest;
use App\Domains\Interfaces\Services\IProductService;
use App\Domains\ValueObjects\CategoryId;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class ProductController
{
    private AddProductHandler $addProductHandler;
    private IProductService $productService;

    public function __construct(AddProductHandler $addProductHandler, IProductService $productService)
    {
        $this->addProductHandler = $addProductHandler;
        $this->productService = $productService;
    }

    public function index(Request $request): JsonResponse
    {
        $result = $this->productService->findAll($request);

        if (!$result->isSuccess()) {
            return response()->json($result->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json($result->toArray(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $addProductCommand = new AddProductCase(
            categoryId: new CategoryId($request->input('category_id')),
            name: $request->input('name'),
            photo: $request->input('photo'),
            status: $request->input('status'),
            price: $request->input('price'),
            file: $request->file('file'),
        );

        $result = $this->addProductHandler->handle($addProductCommand);

        if (!$result->isSuccess()) {
            return response()->json($result->toArray(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return response()->json($result->toArray(), Response::HTTP_OK);
    }
}
