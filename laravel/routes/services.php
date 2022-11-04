<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\SessionApiController;
use App\Http\Controllers\Resources\ProductResource;
use App\Http\Controllers\Resources\SessionResource;
use App\Http\Controllers\Resources\CategoryResource;
use App\Http\Controllers\Resources\LineItemResource;
use App\Http\Controllers\Resources\StockIndexResource;
use App\Http\Controllers\Resources\ShopResourceController;
use App\Http\Controllers\Resources\OrderResourceController;
use App\Http\Controllers\Resources\ProfileResourceController;
use App\Http\Controllers\Resources\CustomerResourceController;
use App\Http\Controllers\Resources\InstanceResourceController;

Route::prefix('session')->controller(SessionApiController::class)->group(static function () {
    Route::get('load-or-create', 'getOrCreate');
});

Route::prefix('order')->controller(OrderApiController::class)->group(static function () {
    Route::prefix('callback')->group(function () {
        Route::get('stripe', 'handleStripeCallback');
    });

    Route::prefix('{order:id}')->group(static function () {
        Route::prefix('checkout')->group(static function () {
            Route::get('{provider}', 'checkout');
        });
    });
});

Route::prefix('stock/index')->controller(StockIndexResource::class)->group(static function () {
    Route::get('/qty/{qty}', 'updateQty');
});

Route::prefix('line-item/{lineItem:id}')->controller(LineItemResource::class)->group(static function () {
    Route::get('/qty/{qty}', 'updateQty');
});


Route::prefix('instance')->controller(InstanceResourceController::class)->group(static function () {
    Route::get('settings', 'settings');
});


Route::prefix('product')->controller(ProductResource::class)->group(static function () {
    Route::get('featured', 'getFeatured');
    Route::get('favorites', 'getFavorites');
    Route::get('search/{term}', 'search');
});

Route::prefix('customer')->resource('customer', CustomerResourceController::class);
Route::prefix('order')->resource('order', OrderResourceController::class);
Route::prefix('instance')->resource('instance', InstanceResourceController::class);
Route::prefix('product')->resource('product', ProductResource::class);
Route::prefix('category')->resource('category', CategoryResource::class);
Route::prefix('session')->resource('session', SessionResource::class);
Route::prefix('line-item')->resource('line-item', LineItemResource::class);
Route::prefix('shop')->resource('shop', ShopResourceController::class);
Route::prefix('profile')->resource('profile', ProfileResourceController::class);
