<?php

use App\Application\Controllers\AuthController;
use App\Application\Controllers\CategoryController;
use App\Application\Controllers\ProductController;
use App\Application\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('v1/auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])
    ->prefix('v1')
    ->group(function () {
        Route::post('auth/logout', [AuthController::class, 'logout']);

        Route::apiResource('user', UserController::class);
        Route::apiResource('category', CategoryController::class);
        Route::apiResource('product', ProductController::class);

        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
