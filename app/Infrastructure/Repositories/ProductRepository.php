<?php

namespace App\Infrastructure\Repositories;

use App\Application\Services\ResponseService;
use App\Domains\Entities\ProductEntity;
use App\Domains\Interfaces\Repositories\IProductRepository;
use App\Infrastructure\Database\Models\Product;
use Illuminate\Http\Request;

class ProductRepository implements IProductRepository
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function store(ProductEntity $product): ProductEntity
    {
        try {
            /** @var Product $model */
            $data = $product->toArray();
            $data['file'] = base64_decode($data['file']);
            $model = $this->product->create($data);

            return $model->toEntity();
        }catch (\Throwable $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function findAll(Request $request): ResponseService
    {
        /** @var Product[] $collections */
        $collections = $this->product->with('category')
            ->paginate(perPage: 10, page: $request->input('page'));

        $result = [];

        foreach ($collections as $collection) {
            $result[] = $collection->toArray();
        }
        return new ResponseService($result);
    }
}
