<?php

namespace App\Http\Controllers\Api;

use Modules\Sessions\Session;
use App\Http\Controllers\ApiController;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class CatalogApiController extends ApiController {
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function addToFavorites(string $productId): void {
        Session::loadFromRequest()?->customer?->favorites()->syncWithoutDetaching([$productId]);
    }
}
