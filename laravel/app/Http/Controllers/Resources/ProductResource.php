<?php

namespace App\Http\Controllers\Resources;

use Modules\Catalog\Product;
use Modules\Sessions\Session;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ResourceController;
use Katyusha\Infrastructure\Attributes\Http\GetRoute;
use Katyusha\Infrastructure\Attributes\Http\Parameters\IdParameterAttribute;

class ProductResource extends ResourceController {
    #[GetRoute(path: '/product')]
    public function index(): JsonResponse {
        return Product::with('category')->get()->jsonResponse();
    }

    #[GetRoute(path: '/product/featured')]
    public function getFeatured(): JsonResponse {
        return Product::with('category')->get()->jsonResponse();
    }

    #[GetRoute(path: '/product/favorites')]
    public function getFavorites(): JsonResponse {
        return $this->json(Session::loadFromRequest()?->customer?->favorites ?? []);
    }

    #[GetRoute(path: '/product/search/{term}')]
    public function search(string $term): JsonResponse {
        return $this->json(Product::query()->termFilter($term)->get());
    }

    #[GetRoute(path: '/product/{id}', parameters: [new IdParameterAttribute()])]
    public function show(string $namespace): JsonResponse {
        return Product::where('namespace', $namespace)->with('category')->first()->jsonResponse();
    }
}
