<?php

namespace App\Http\Controllers\Resources;

use Modules\Sessions\Session;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ResourceController;
use Katyusha\Infrastructure\Attributes\Http\GetRoute;
use Katyusha\Infrastructure\Attributes\Http\Parameters\IdParameterAttribute;

class SessionResource extends ResourceController {
    #[GetRoute(path: '/session/{id}', parameters: [new IdParameterAttribute()])]
    public function show(string $id): JsonResponse {
        return Session::whereId($id)->with('customer')->first()->jsonResponse();
    }

    #[GetRoute(path: '/session/create')]
    public function create(): JsonResponse {
        return Session::make()->saveAndReturn()->jsonResponse();
    }
}
