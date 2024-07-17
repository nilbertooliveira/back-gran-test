<?php

namespace App\Application\Services;

use App\Domains\Interfaces\Repositories\ICategoryRepository;
use App\Domains\Interfaces\Services\ICategoryService;
use Illuminate\Http\Request;

class CategoryService implements ICategoryService
{
    private ICategoryRepository $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function store(Request $request): ResponseService
    {
        try {
            $category = $this->categoryRepository->store($request);

            $result = new ResponseService($category);
        } catch (\Throwable $e) {
            $result = new ResponseService($e->getMessage(), false);
        }
        return $result;
    }

    public function show(int $id): ResponseService
    {
        try {
            $category = $this->categoryRepository->show($id);

            $result = new ResponseService($category);
        } catch (\Throwable $e) {
            $result = new ResponseService($e->getMessage(), false);
        }
        return $result;
    }

    /**
     * @return ResponseService
     */
    public function findAll(): ResponseService
    {
        try {
            return $this->categoryRepository->findAll();
        } catch (\Throwable $e) {
            return new ResponseService($e->getMessage(), false);
        }
    }
}
