<?php

namespace App\Application\Handlers;

use App\Application\Commands\AddProductCase;
use App\Application\Services\ResponseService;
use App\Domains\Interfaces\Services\IProductService;

class AddProductHandler
{
    private IProductService $productService;

    /**
     * Create a new class instance.
     */
    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }

    public function handle(AddProductCase $addProductCommand): ResponseService
    {
        return $this->productService->store($addProductCommand);
    }
}
