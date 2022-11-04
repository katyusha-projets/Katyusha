<?php

namespace App\Http\Controllers\Resources;

use Modules\Catalog\Category;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ResourceController;
use Katyusha\Infrastructure\Attributes\Http\GetRoute;
use Katyusha\Infrastructure\Attributes\Http\Parameters\IdParameterAttribute;

class CategoryResource extends ResourceController {
    #[GetRoute(path: '/category')]
    public function index(): JsonResponse {
        return Category::with('children')->with('products')->whereNull('parent_id')->get()->jsonResponse();
    }

    #[GetRoute(path: '/category/{id}', parameters: [new IdParameterAttribute()])]
    public function show(string $id): JsonResponse {
        return Category::whereId($id)->with('products')->first()->jsonResponse();
    }
}
