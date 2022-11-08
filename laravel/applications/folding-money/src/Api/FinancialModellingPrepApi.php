<?php

namespace FoldingMoney\Api;

use DateTime;
use stdClass;
use Throwable;
use JsonException;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use MongoDB\BSON\UTCDateTime;
use FoldingMoney\Enums\FinancialDataEnum;
use FoldingMoney\Enums\ReportPeriodsEnum;
use GuzzleHttp\Exception\GuzzleException;
use FoldingMoney\Exceptions\FinancialApiException;

class FinancialModellingPrepApi {
    /**
     * @throws FinancialApiException
     */
    protected static function get(string $path, array $queryParams = []): object|array {
        $queryParams = array_merge(['apikey' => self::getApiKey()], $queryParams);
        $url         = self::getApiUrl().$path.'?'.http_build_query($queryParams);

        try {
            $request = self::client()->get($url);
        } catch(GuzzleException $e) {
            throw new FinancialApiException("API request failed - ${url}", $e->getCode(), $e);
        }

        $response = $request->getBody()->getContents();

        try {
            $response = json_decode($response, false, 512, JSON_THROW_ON_ERROR);

            return is_array($response) ? self::parseResponse($response) : $response;
        } catch(JsonException $e) {
            throw new FinancialApiException('JSON decode failed for API call', $e->getCode(), $e);
        }
    }

    protected static function parseResponse(array $records): array {
        $parsedRecords = [];

        foreach ($records as $record) {
            $row       = new stdClass();
            $recordKey = key($record);

            // Is date
            if (preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $recordKey)) {
                $record          = $record->{$recordKey};
                $record->date    = new UTCDateTime(new DateTime($recordKey));
                $parsedRecords[] = $record;
                continue;
            }

            foreach ($record as $k => $v) {
                if (Str::contains(mb_strtolower($k), ['year'])) {
                    $v = (int) $v;
                }

                if (Str::contains(mb_strtolower($k), ['date'])) {
                    $boom = explode(' ', $v);

                    try {
                        $v = new UTCDateTime(new DateTime($boom[0]));
                    } catch (Throwable $e) {
                    }
                }

                $row->{$k} = $v;
            }

            $parsedRecords[] = $row;
        }

        return $parsedRecords;
    }

    protected static function client(): Client {
        return new Client();
    }

    protected static function getApiKey(): string {
        return config('folding-money.api.financial-modelling.key');
    }

    protected static function getApiUrl(): string {
        return config('folding-money.api.financial-modelling.url');
    }

    protected static function getApiPath(FinancialDataEnum $FinancialDataEnum): string {
        return match ($FinancialDataEnum) {
            FinancialDataEnum::REVENUE_PRODUCT_SEGMENTATION                         => 'v4/revenue-product-segmentation',
            FinancialDataEnum::REVENUE_GEOGRAPHIC_SEGMENTATION                      => 'v4/revenue-geographic-segmentation',
            FinancialDataEnum::SHARES_FLOAT                                         => 'v4/shares_float',
            FinancialDataEnum::FINANCIAL_REPORTS_DATES                              => 'v4/financial-reports-dates',
            FinancialDataEnum::SCORE                                                => 'v4/score',

            FinancialDataEnum::INCOME_STATEMENT                          => 'income-statement',
            FinancialDataEnum::BALANCE_SHEET_STATEMENT                   => 'balance-sheet-statement',
            FinancialDataEnum::CASH_FLOW_STATEMENT                       => 'cash-flow-statement',
            FinancialDataEnum::INCOME_STATEMENT_AS_REPORTED              => 'income-statement-as-reported',
            FinancialDataEnum::BALANCE_SHEET_STATEMENT_AS_REPORTED       => 'balance-sheet-statement-as-reported',
            FinancialDataEnum::CASH_FLOW_STATEMENT_AS_REPORTED           => 'cash-flow-statement-as-reported',
            FinancialDataEnum::FINANCIAL_STATEMENT_FULL_AS_REPORTED      => 'financial-statement-full-as-reported',
            FinancialDataEnum::EARNING_CALL_TRANSCRIPT                   => 'earning_call_transcript',
            FinancialDataEnum::SEC_FILINGS                               => 'sec_filings',
            FinancialDataEnum::RATIOS_TTM                                => 'ratios-ttm',
            FinancialDataEnum::RATIOS                                    => 'ratios',
            FinancialDataEnum::ENTERPRISE_VALUES                         => 'enterprise-values',
            FinancialDataEnum::INCOME_STATEMENT_GROWTH                   => 'income-statement-growth',
            FinancialDataEnum::BALANCE_SHEET_STATEMENT_GROWTH            => 'balance-sheet-statement-growth',
            FinancialDataEnum::CASH_FLOW_STATEMENT_GROWTH                => 'cash-flow-statement-growth',
            FinancialDataEnum::KEY_METRICS_TTM                           => 'key-metrics-ttm',
            FinancialDataEnum::KEY_METRICS                               => 'key-metrics',
            FinancialDataEnum::FINANCIAL_GROWTH                          => 'financial-growth',
            FinancialDataEnum::RATING                                    => 'rating',
            FinancialDataEnum::HISTORICAL_RATING                         => 'historical-rating',
            FinancialDataEnum::DISCOUNTED_CASH_FLOW                      => 'discounted-cash-flow',
            FinancialDataEnum::HISTORICAL_DISCOUNTED_CASH_FLOW_STATEMENT => 'historical-discounted-cash-flow-statement',
            FinancialDataEnum::HISTORICAL_DAILY_DISCOUNTED_CASH_FLOW     => 'historical-daily-discounted-cash-flow',
            FinancialDataEnum::PROFILE                                   => 'profile',
            FinancialDataEnum::KEY_EXECUTIVES                            => 'key-executives',
            FinancialDataEnum::MARKET_CAPITALIZATION                     => 'market-capitalization',
            FinancialDataEnum::HISTORICAL_MARKET_CAPITALIZATION          => 'historical-market-capitalization',
            FinancialDataEnum::PRESS_RELEASES                            => 'press-releases',
            FinancialDataEnum::GRADE                                     => 'grade',
            FinancialDataEnum::EARNINGS_SURPRISES                        => 'earnings-surprises',
            FinancialDataEnum::ANALYST_ESTIMATES                         => 'analyst-estimates',
            FinancialDataEnum::QUOTE                                     => 'quote',
            FinancialDataEnum::QUOTE_SHORT                               => 'quote-short',
            FinancialDataEnum::HISTORICAL_PRICE_FULL                     => 'historical-price-full',
        };
    }

    /**
     * @throws FinancialApiException
     */
    public static function apiCall(FinancialDataEnum $path, ?string $ticker = null, ?array $params = []): array|object {
        $url    = self::getApiPath($path);
        $ticker = mb_strtoupper($ticker);

        if (Str::contains($url, ['v4'])) {
            $params['symbol'] = $ticker;
        } else {
            $url = '/v3/'.$url.'/'.$ticker;
        }

        return self::get($url, $params);
    }

    /**
     * @throws FinancialApiException
     * @throws Throwable
     */
    public static function fetchAllData(string $ticker, ReportPeriodsEnum $period): object {
        $data = new stdClass();
        foreach (FinancialDataEnum::cases() as $case) {
            $data->{$case->name} = self::apiCall($case, $ticker, ['period' => $period->value, 'structure' => 'flat']);
        }

        return $data;
    }
}
