<?php

namespace App\Domains\Interfaces\Repositories;

use App\Application\Services\ResponseService;
use App\Infrastructure\Database\Models\Category;
use Illuminate\Http\Request;

interface ICategoryRepository
{
    public function store(Request $request): Category;

    public function show(int $id): Category;

    public function findAll(): ResponseService;
}
