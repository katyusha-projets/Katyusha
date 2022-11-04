<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Resources\StockResource;
use App\Http\Controllers\Resources\StockIndexResource;

Route::prefix('stock/index')->controller(StockIndexResource::class)->group(static function () {
    Route::post('/save-user-indexes', 'saveForCurrentUser');
    Route::get('/current-user', 'getForCurrentUser');
    Route::get('/user/followed/{profileId}', 'getProfileIndexesFollowed');
    Route::get('/customer/{customerId}', 'getByCustomer');
    Route::prefix('{indexId}')->group(static function () {
        Route::get('/followers/', 'getFollowers');
        Route::get('/follow/', 'followIndex');
        Route::get('/unfollow/', 'unfollowIndex');
    });
});
Route::prefix('stock')->resource('stock', StockResource::class);
Route::prefix('stock/index')->resource('stock/index', StockIndexResource::class);
