<?php

namespace App\Http\Controllers\Resources;

use Modules\Instances\Instance;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ResourceController;

class ShopResourceController extends ResourceController {
    public function show(string $namespace): JsonResponse {
        return Instance::whereNamespace($namespace)->with('productCategories')->first()->jsonResponse();
    }
}
