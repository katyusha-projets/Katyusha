<?php

use Illuminate\Support\Facades\Route;
use FoldingMoney\Controllers\UserController;
use FoldingMoney\Controllers\TickerController;
use App\Http\Controllers\Resources\StockResource;
use FoldingMoney\Controllers\PortfolioController;
use App\Http\Controllers\Resources\StockIndexResource;

Route::prefix('user')->controller(UserController::class)->group(static function () {
    Route::get('session', 'session');
    Route::prefix('{username}')->group(static function () {
        Route::get('profile', 'profile');
    });
});

Route::prefix('ticker')->controller(TickerController::class)->group(static function () {
    Route::get('data/{ticker}', 'data');
    Route::get('data/{ticker}/year', 'dataYearGrouping');
    Route::get('latest/{ticker}', 'latestData');
    Route::prefix('{id}')->group(static function () {
        Route::get('set-user-portfolios', 'setCurrentUserPortfolios');
        Route::get('follow', 'follow');
        Route::get('unfollow', 'unfollow');
    });
});

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

Route::prefix('portfolio')->resource('portfolio', PortfolioController::class);
Route::prefix('ticker')->resource('ticker', TickerController::class);
Route::prefix('user')->resource('user', UserController::class);
Route::prefix('stock')->resource('stock', StockResource::class);
Route::prefix('stock/index')->resource('stock/index', StockIndexResource::class);
