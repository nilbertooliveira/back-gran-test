<?php

namespace App\Domains\Interfaces\Services;

use App\Application\Services\ResponseService;
use Illuminate\Http\Request;

interface ICategoryService
{
    public function findAll(): ResponseService;

    public function store(Request $request): ResponseService;

    public function show(int $id): ResponseService;
}
