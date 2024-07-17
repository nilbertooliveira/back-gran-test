<?php

namespace App\Providers;

use App\Application\Services\AuthService;
use App\Application\Services\CategoryService;
use App\Application\Services\ProductService;
use App\Application\Services\UserService;
use App\Domains\Interfaces\Repositories\ICategoryRepository;
use App\Domains\Interfaces\Repositories\IProductRepository;
use App\Domains\Interfaces\Repositories\IUserRepository;
use App\Domains\Interfaces\Services\IAuthService;
use App\Domains\Interfaces\Services\ICategoryService;
use App\Domains\Interfaces\Services\IProductService;
use App\Domains\Interfaces\Services\IUserService;
use App\Infrastructure\Repositories\CategoryRepository;
use App\Infrastructure\Repositories\ProductRepository;
use App\Infrastructure\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IAuthService::class, AuthService::class);
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(ICategoryService::class, CategoryService::class);
        $this->app->bind(IProductService::class, ProductService::class);

        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(IProductRepository::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return 'Database\\Factories\\' . class_basename($modelName) . 'Factory';
        });
        Factory::guessModelNamesUsing(function ($string) {
            return 'App\\Infrastructure\\Database\\Models\\' . str_replace('Factory', '', class_basename($string));
        });
    }
}
