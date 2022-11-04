<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OauthController;

Route::prefix('{provider}')->controller(OauthController::class)->group(static function () {
    Route::get('auth', 'auth');
    Route::get('redirect', 'redirect');
});
