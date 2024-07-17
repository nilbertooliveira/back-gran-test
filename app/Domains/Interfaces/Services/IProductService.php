<?php

namespace App\Domains\Interfaces\Services;

use App\Application\Commands\AddProductCase;
use App\Application\Services\ResponseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface IProductService
{
    public function store(AddProductCase $addProductCommand): ResponseService;

    public function findAll(Request $request): ResponseService;
}
