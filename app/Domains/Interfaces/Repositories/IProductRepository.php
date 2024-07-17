<?php

namespace App\Domains\Interfaces\Repositories;

use App\Application\Services\ResponseService;
use App\Domains\Entities\ProductEntity;
use Illuminate\Http\Request;

interface IProductRepository
{
    public function store(ProductEntity $product): ProductEntity;

    public function findAll(Request $request): ResponseService;
}
