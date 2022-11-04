<?php

namespace App\Http\Controllers\Resources;

use DTO\DTOSchemas;
use DTO\Profiles\ProfileDTO;
use Modules\Orders\LineItem;
use Modules\Profiles\Profile;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\ResourceController;
use Katyusha\Infrastructure\Attributes\Http\PostRoute;

class LineItemResource extends ResourceController {
    public function index(): JsonResponse {
        // TODO: Implement index() method.
    }

    #[PostRoute(path: '/customer', dto: DTOSchemas::CUSTOMER)]
    public function store(): JsonResponse {
        return Profile::make()->fill(ProfileDTO::fromRequest()->toArray())->saveAndReturn()->jsonResponse();
    }

    public function updateQty(LineItem $lineItem, int $qty): void {
        $lineItem->updateQty($qty);
    }

    public function show(string $id): JsonResponse {
        // TODO: Implement show() method.
    }

    public function update(string $id): JsonResponse {
        // TODO: Implement update() method.
    }

    public function destroy(LineItem $lineItem): void {
        $lineItem->delete();
    }

    public function edit(string $id): JsonResponse {
        // TODO: Implement edit() method.
    }
}
