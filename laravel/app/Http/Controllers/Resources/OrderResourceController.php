<?php

namespace App\Http\Controllers\Resources;

use DTO\DTOSchemas;
use DTO\Orders\OrderDTO;
use Modules\Orders\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ResourceController;
use Katyusha\Infrastructure\Attributes\Http\PostRoute;

class OrderResourceController extends ResourceController {
    public function show(Order $order): JsonResponse {
        return $order->jsonResponse();
    }

    #[PostRoute(path: '/order', dto: DTOSchemas::ORDER)]
    public function store(): JsonResponse {
        return Order::make()->fill(OrderDTO::fromRequest()->toArray())->saveAndReturn()->jsonResponse();
    }

    #[PostRoute(path: '/order')]
    public function create(Request $request): JsonResponse {
        return $this->store();
    }

    public function update(string $id): JsonResponse {
        // TODO: Implement update() method.
    }

    public function destroy(string $id): JsonResponse {
        // TODO: Implement destroy() method.
    }

    public function edit(string $id): JsonResponse {
        // TODO: Implement edit() method.
    }
}
