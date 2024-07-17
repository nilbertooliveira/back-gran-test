<?php

namespace App\Infrastructure\Repositories;

use App\Application\Services\ResponseService;
use App\Domains\Interfaces\Repositories\ICategoryRepository;
use App\Infrastructure\Database\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository implements ICategoryRepository
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function store(Request $request): Category
    {
        return $this->category->create($request->all());
    }

    public function show(int $id): Category
    {
        return $this->category->findOrFail($id);
    }

    public function findAll(): ResponseService
    {
        /** @var Category[] $collections */
        $collections = $this->category->get();

        $result = [];

        foreach ($collections as $collection) {
            $result[] = $collection->toArray();
        }
        return new ResponseService($result);
    }
}
