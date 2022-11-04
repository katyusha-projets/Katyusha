<?php

namespace FoldingMoney\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use FoldingMoney\Domains\Tickers\Ticker;

class TickerController extends Controller {
    public function index(): JsonResponse {
        return Ticker::query()->whereHasFullData()->limit(20)->get()->jsonResponse();
    }

    public function show(string $ticker): JsonResponse {
        return Ticker::whereTicker($ticker)->withAllData()->first()->jsonResponse();
    }

    public function search(string $term): JsonResponse {
        return $this->json(Ticker::query()->termFilter($term)->get());
    }
}
