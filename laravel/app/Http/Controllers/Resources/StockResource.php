<?php

namespace App\Http\Controllers\Resources;

use Trading\Models\Ticker;
use Modules\Catalog\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ResourceController;

class StockResource extends ResourceController {
    public function index(): JsonResponse {
        return Ticker::query()->whereHasFullData()->limit(20)->get()->jsonResponse();
    }

    public function show(string $ticker): JsonResponse {
        return Ticker::whereTicker($ticker)->withAllData()->first()->jsonResponse();
    }

    public function search(string $term): JsonResponse {
        return $this->json(Product::query()->termFilter($term)->get());
    }
}
