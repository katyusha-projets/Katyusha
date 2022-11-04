<?php


use Illuminate\Support\Facades\Route;
use FoldingMoney\Controllers\TickerController;

Route::get('/download/{ticker}', [TickerController::class, 'download']);
