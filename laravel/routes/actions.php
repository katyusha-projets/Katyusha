<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\CatalogApiController;
use App\Http\Controllers\Api\CustomerApiController;

Route::prefix('order')->controller(OrderApiController::class)->group(static function () {
    Route::any('add-item', 'addToCart');
    Route::any('create', 'createOrder');
});

Route::prefix('customer')->controller(CustomerApiController::class)->group(static function () {
    Route::post('login-or-register', 'loginOrRegister');
});


Route::prefix('favorites')->controller(CatalogApiController::class)->group(static function () {
    Route::any('add/{productId}', 'addToFavorites');
    Route::any('remove/{productId}', 'removeFromFavorites');
});
