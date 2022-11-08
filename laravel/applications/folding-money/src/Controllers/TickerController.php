<?php

namespace FoldingMoney\Controllers;

use HttpException;
use App\Models\Session;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use FoldingMoney\Domains\Tickers\Ticker;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use FoldingMoney\Domains\FinancialRecords\FinancialRecords;
use FoldingMoney\Domains\FinancialRecords\Exporter\ExcelExporter;

class TickerController extends Controller {
    public function index(): JsonResponse {
        return Ticker::query()->whereHasFullData()->limit(20)->get()->jsonResponse();
    }

    public function download(string $ticker): BinaryFileResponse|Response {
        $data = FinancialRecords::fetch($ticker);

        return (new ExcelExporter($data))->download($ticker.'.xlsx', Excel::XLSX);
    }

    public function latestData(string $ticker): JsonResponse {
        return response()->json(FinancialRecords::fetch($ticker)->keyData()->latestValues());
    }

    public function data(string $ticker): JsonResponse {
        return response()->json(FinancialRecords::fetch($ticker)->keyData());
    }

    public function dataYearGrouping(string $ticker): JsonResponse {
        return response()->json(FinancialRecords::fetch($ticker)->keyData()->groupByYear());
    }

    public function show(string $ticker): JsonResponse {
        return Ticker::whereTicker($ticker)->with('followers')->first()->jsonResponse();
    }

    public function search(string $term): JsonResponse {
        return $this->json(Ticker::query()->termFilter($term)->get());
    }

    /**
     * @throws HttpException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function setCurrentUserPortfolios(string $id, Request $request): JsonResponse {
        if (!$user = Session::currentUser()) {
            throw new HttpException('Current user saving failed - no customer ID');
        }
        $indexesToSet = $request->get('portfolios');
        foreach ($user?->portfolios as $portfolio) {
            if (in_array($portfolio->id, $indexesToSet, true)) {
                $portfolio->tickers()->syncWithoutDetaching([$id]);
            } else {
                $portfolio->tickers()->detach([$id]);
            }
        }

        return $this->json(['success' => true]);
    }

    /**
     * @throws HttpException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function follow(string $id): JsonResponse {
        if (!$user = Session::currentUser()) {
            throw new HttpException('Current user saving failed - no customer ID');
        }

        $user->tickersWatching()->syncWithoutDetaching([$id]);

        return $this->json(['success' => true]);
    }

    /**
     * @throws HttpException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function unfollow(string $id): JsonResponse {
        if (!$user = Session::currentUser()) {
            throw new HttpException('Current user saving failed - no customer ID');
        }

        $user->tickersWatching()->detach([$id]);

        return $this->json(['success' => true]);
    }
}
