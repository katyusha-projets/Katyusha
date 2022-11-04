<?php

namespace App\Http\Controllers\Resources;

use HttpException;
use Illuminate\Http\Request;
use Modules\Profiles\Profile;
use Modules\Sessions\Session;
use Trading\Models\StockIndex;
use Illuminate\Http\JsonResponse;
use Trading\DTOs\CreateStockIndexDTO;
use App\Http\Controllers\ResourceController;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class StockIndexResource extends ResourceController {
    public function index(): JsonResponse {
        return StockIndex::query()->get()->jsonResponse();
    }

    public function show(string $namespace): JsonResponse {
        return StockIndex::whereNamespace($namespace)->first()->jsonResponse();
    }

    public function create(Request $request): JsonResponse {
        return StockIndex::create(CreateStockIndexDTO::fromArray($request->all()))->saveAndReturn()->jsonResponse();
    }

    public function getForCurrentUser(): JsonResponse {
        if (!$session = Session::loadFromRequest()) {
            return $this->json(null);
        }

        return $this->getByCustomer($session->customer_id);
    }

    public function getProfileIndexesFollowed(string $profileId): JsonResponse {
        return Profile::getById($profileId)->followingStockIndexes->jsonResponse();
    }

    public function getFollowers(string $indexId): JsonResponse {
        return StockIndex::getById($indexId)->followers->jsonResponse();
    }

    /**
     * @throws HttpException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function followIndex(string $indexId): JsonResponse {
        if (!$customerId = Session::loadFromRequest()?->customer_id) {
            throw new HttpException('Current user saving failed - no customer ID');
        }

        StockIndex::getById($indexId)?->followers()->syncWithoutDetaching([$customerId]);

        return $this->json(['success' => true]);
    }

    /**
     * @throws HttpException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function unfollowIndex(string $indexId): JsonResponse {
        if (!$customerId = Session::loadFromRequest()?->customer_id) {
            throw new HttpException('Current user saving failed - no customer ID');
        }

        StockIndex::getById($indexId)?->followers()->detach([$customerId]);

        return $this->json(['success' => true]);
    }

    /**
     * @throws HttpException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function saveForCurrentUser(Request $request): JsonResponse {
        if (!$customerId = Session::loadFromRequest()?->customer_id) {
            throw new HttpException('Current user saving failed - no customer ID');
        }

        $tickerId     = $request->get('ticker_id');
        $indexesToSet = $request->get('indexes');
        $customer     = Profile::getById($customerId);
        foreach ($customer?->stockIndexes as $index) {
            if (in_array($index->id, $indexesToSet, true)) {
                $this->addTicker($tickerId, $index->id);
            } else {
                $this->removeTicker($tickerId, $index->id);
            }
        }

        return $this->json(['success' => true]);
    }

    public function getByCustomer(?string $customerId): JsonResponse {
        if (!$customerId) {
            return $this->json(null);
        }

        return StockIndex::where('profile_id', $customerId)->get()->jsonResponse();
    }

    public function removeTicker(string $tickerId, string $indexId): JsonResponse {
        StockIndex::getById($indexId)?->tickers()->detach([$tickerId]);

        return $this->json(['success' => true]);
    }

    public function addTicker(string $tickerId, string $indexId): JsonResponse {
        StockIndex::getById($indexId)?->tickers()->syncWithoutDetaching([$tickerId]);

        return $this->json(['success' => true]);
    }
}
