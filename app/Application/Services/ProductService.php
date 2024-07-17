<?php

namespace App\Application\Services;

use App\Application\Commands\AddProductCase;
use App\Domains\Entities\ProductEntity;
use App\Domains\Interfaces\Repositories\IProductRepository;
use App\Domains\Interfaces\Services\IProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


class ProductService implements IProductService
{
    private IProductRepository $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function store(AddProductCase $addProductCommand): ResponseService
    {
        try {
            $product = new ProductEntity(
                categoryId: $addProductCommand->getCategoryId(),
                name: $addProductCommand->getName(),
                price: $addProductCommand->getPrice(),
                photo: $addProductCommand->getPhoto(),
                status: $addProductCommand->getStatus(),
                file: $addProductCommand->getFile()
            );
            $productEntity = $this->productRepository->store($product);

            $this->upload($product);

            $result = new ResponseService($productEntity->toArray());
        } catch (\Throwable $e) {
            $result = new ResponseService($e->getMessage(), false);
        }
        return $result;
    }

    /**
     * @return ResponseService
     */
    public function findAll(Request $request): ResponseService
    {
        $cacheKey = 'products_findAll';
        try {
            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }
            $response = $this->productRepository->findAll($request);

            Cache::set($cacheKey, $response, 60);

            return $response;

        } catch (\Throwable $e) {
            return new ResponseService($e->getMessage(), false);
        }
    }

    /**
     * @param ProductEntity $entity
     * @return bool
     */
    public function upload(ProductEntity $entity)
    {
        return Storage::disk('r2')->put($entity->getPhoto(), $entity->getFile()->getContent());
    }
}
