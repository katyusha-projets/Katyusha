<?php

namespace FoldingMoney\Controllers;

use Illuminate\Http\Request;
use Modules\Profiles\Profile;
use Modules\Sessions\Session;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Psr\Container\NotFoundExceptionInterface;
use FoldingMoney\Domains\Portfolios\Portfolio;
use Psr\Container\ContainerExceptionInterface;

class PortfolioController extends Controller {
    public function index(): JsonResponse {
        return Portfolio::query()->get()->jsonResponse();
    }

    public function show(string $namespace): JsonResponse {
        return Portfolio::whereNamespace($namespace)->first()->jsonResponse();
    }

    public function create(Request $request): JsonResponse {
        return Portfolio::create(CreatePortfolioDTO::fromArray($request->all()))->saveAndReturn()->jsonResponse();
    }

    public function getForCurrentUser(): JsonResponse {
        if (!$session = Session::loadFromRequest()) {
            return $this->json(null);
        }

        return $this->getByCustomer($session->customer_id);
    }

    public function getProfileIndexesFollowed(string $profileId): JsonResponse {
        return Profile::getById($profileId)->followingPortfolioes->jsonResponse();
    }

    public function getFollowers(string $indexId): JsonResponse {
        return Portfolio::getById($indexId)->followers->jsonResponse();
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

        Portfolio::getById($indexId)?->followers()->syncWithoutDetaching([$customerId]);

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

        Portfolio::getById($indexId)?->followers()->detach([$customerId]);

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
        foreach ($customer?->Portfolioes as $index) {
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

        return Portfolio::where('profile_id', $customerId)->get()->jsonResponse();
    }

    public function removeTicker(string $tickerId, string $indexId): JsonResponse {
        Portfolio::getById($indexId)?->tickers()->detach([$tickerId]);

        return $this->json(['success' => true]);
    }

    public function addTicker(string $tickerId, string $indexId): JsonResponse {
        Portfolio::getById($indexId)?->tickers()->syncWithoutDetaching([$tickerId]);

        return $this->json(['success' => true]);
    }
}
