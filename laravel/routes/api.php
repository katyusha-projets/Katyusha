<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrderApiController;

Route::prefix('order/{Order:id}')->controller(OrderApiController::class)->group(static function () {
    Route::get('checkout/{paymentMethod}', 'checkout');
});
