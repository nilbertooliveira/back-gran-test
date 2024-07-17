<?php

namespace Database\Seeders;

use App\Infrastructure\Database\Models\Category;
use App\Infrastructure\Database\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoryAndProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('pt_BR');

        $category = ['name' => 'Desktop PC', 'description' => 'Desktop PC'];
        $model = Category::firstOrCreate(
            [
                'name' => $category['name'],
            ],
            $category
        );
        $product = [
            'name' => "Apple iMac 27",
            'price' => $faker->randomFloat(2, 3000, 9000),
            'photo' => 'imac-front-image.png',
            'category_id' => $model->id,
        ];
        Product::firstOrCreate(
            [
                'name' => $product['name'],
                'category_id' => $model->id
            ],
            $product
        );

        $category = ['name' => 'Phone', 'description' => 'Phone'];
        $model = Category::firstOrCreate(
            [
                'name' => $category['name'],
            ],
            $category
        );
        $product = [
            'name' => "Apple iPhone 14",
            'price' => $faker->randomFloat(2, 3000, 9000),
            'photo' => 'apple-iphone-14.png',
            'category_id' => $model->id,
        ];
        Product::firstOrCreate(
            [
                'name' => $product['name'],
                'category_id' => $model->id
            ],
            $product
        );

        $category = ['name' => 'Console', 'description' => 'Console'];
        $model = Category::firstOrCreate(
            [
                'name' => $category['name'],
            ],
            $category
        );
        $product = [
            'name' => "Xbox Series S",
            'price' => $faker->randomFloat(2, 3000, 9000),
            'photo' => 'xbox-series-s.png',
            'category_id' => $model->id,
        ];
        Product::firstOrCreate(
            [
                'name' => $product['name'],
                'category_id' => $model->id
            ],
            $product
        );

        $product = [
            'name' => "PlayStation 5",
            'price' => $faker->randomFloat(2, 3000, 9000),
            'photo' => 'playstation-5.png',
            'category_id' => $model->id,
        ];
        Product::firstOrCreate(
            [
                'name' => $product['name'],
                'category_id' => $model->id
            ],
            $product
        );

        $product = [
            'name' => "Xbox Series X",
            'price' => $faker->randomFloat(2, 3000, 9000),
            'photo' => 'xbox-series-x.png',
            'category_id' => $model->id,
        ];
        Product::firstOrCreate(
            [
                'name' => $product['name'],
                'category_id' => $model->id
            ],
            $product
        );
    }
}
