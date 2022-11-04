<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\RedditClientController;

Route::prefix('reddit')->controller(RedditClientController::class)->group(static function () {
    Route::get('/', 'dev');
    Route::get('about', 'about');

    Route::prefix('api')->group(function () {
//        Route::get('subreddit/${subreddit}', fn() => );
    });

    Route::prefix('oauth')->group(function () {
        Route::get('login', 'login');
        Route::get('redirect', 'redirect');
    });
});
