<?php

namespace FoldingMoney\Domains\FinancialRecords;

use FoldingMoney\Enums\FinancialDataEnum;
use Illuminate\Contracts\Support\Arrayable;
use FoldingMoney\Domains\FinancialRecords\Entities\Grade;
use FoldingMoney\Domains\FinancialRecords\Entities\Quote;
use FoldingMoney\Domains\FinancialRecords\Entities\Score;
use FoldingMoney\Domains\FinancialRecords\Entities\Rating;
use FoldingMoney\Domains\FinancialRecords\Entities\Ratios;
use FoldingMoney\Domains\FinancialRecords\Entities\Profile;
use FoldingMoney\Domains\FinancialRecords\Entities\RatiosTtm;
use FoldingMoney\Domains\FinancialRecords\Entities\KeyMetrics;
use FoldingMoney\Domains\FinancialRecords\Entities\QuoteShort;
use FoldingMoney\Domains\FinancialRecords\Entities\SecFilings;
use FoldingMoney\Domains\FinancialRecords\Entities\SharesFloat;
use FoldingMoney\Domains\FinancialRecords\Entities\KeyExecutives;
use FoldingMoney\Domains\FinancialRecords\Entities\KeyMetricsTtm;
use FoldingMoney\Domains\FinancialRecords\Entities\PressReleases;
use FoldingMoney\Domains\FinancialRecords\Entities\FinancialGrowth;
use FoldingMoney\Domains\FinancialRecords\Entities\IncomeStatement;
use FoldingMoney\Domains\FinancialRecords\Entities\AnalystEstimates;
use FoldingMoney\Domains\FinancialRecords\Entities\EnterpriseValues;
use FoldingMoney\Domains\FinancialRecords\Entities\HistoricalRating;
use FoldingMoney\Domains\FinancialRecords\Entities\CashFlowStatement;
use FoldingMoney\Domains\FinancialRecords\Entities\EarningsSurprises;
use FoldingMoney\Domains\FinancialRecords\Entities\DiscountedCashFlow;
use FoldingMoney\Domains\FinancialRecords\Entities\HistoricalPriceFull;
use FoldingMoney\Domains\FinancialRecords\Entities\MarketCapitalization;
use FoldingMoney\Domains\FinancialRecords\Entities\BalanceSheetStatement;
use FoldingMoney\Domains\FinancialRecords\Entities\EarningCallTranscript;
use FoldingMoney\Domains\FinancialRecords\Entities\FinancialReportsDates;
use FoldingMoney\Domains\FinancialRecords\Entities\IncomeStatementGrowth;
use FoldingMoney\Domains\FinancialRecords\Entities\CashFlowStatementGrowth;
use FoldingMoney\Domains\FinancialRecords\Entities\IncomeStatementAsReported;
use FoldingMoney\Domains\FinancialRecords\Entities\RevenueProductSegmentation;
use FoldingMoney\Domains\FinancialRecords\Entities\BalanceSheetStatementGrowth;
use FoldingMoney\Domains\FinancialRecords\Entities\CashFlowStatementAsReported;
use FoldingMoney\Domains\FinancialRecords\Entities\RevenueGeographicSegmentation;
use FoldingMoney\Domains\FinancialRecords\Entities\HistoricalMarketCapitalization;
use FoldingMoney\Domains\FinancialRecords\Entities\BalanceSheetStatementAsReported;
use FoldingMoney\Domains\FinancialRecords\Entities\FinancialStatementFullAsReported;
use FoldingMoney\Domains\FinancialRecords\Entities\HistoricalDailyDiscountedCashFlow;
use FoldingMoney\Domains\FinancialRecords\Entities\HistoricalDiscountedCashFlowStatement;

/**
 * @property FinancialCollection|BalanceSheetStatement[]                 balanceSheetStatement
 * @property FinancialCollection|IncomeStatement[]                       incomeStatement
 * @property FinancialCollection|RevenueProductSegmentation[]            revenueProductSegmentation
 * @property FinancialCollection|RevenueGeographicSegmentation[]         revenueGeographicSegmentation
 * @property FinancialCollection|Score[]                                 score
 * @property FinancialCollection|FinancialReportsDates[]                 financialReportsDates
 * @property FinancialCollection|SharesFloat[]                           sharesFloat
 * @property FinancialCollection|CashFlowStatement[]                     cashFlowStatement
 * @property FinancialCollection|IncomeStatementAsReported[]             incomeStatementAsReported
 * @property FinancialCollection|BalanceSheetStatementAsReported[]       balanceSheetStatementAsReported
 * @property FinancialCollection|CashFlowStatementAsReported[]           cashFlowStatementAsReported
 * @property FinancialCollection|FinancialStatementFullAsReported[]      financialStatementFullAsReported
 * @property FinancialCollection|EarningCallTranscript[]                 earningCallTranscript
 * @property FinancialCollection|SecFilings[]                            secFilings
 * @property FinancialCollection|RatiosTtm[]                             ratiosTtm
 * @property FinancialCollection|Ratios[]                                ratios
 * @property FinancialCollection|EnterpriseValues[]                      enterpriseValues
 * @property FinancialCollection|IncomeStatementGrowth[]                 incomeStatementGrowth
 * @property FinancialCollection|BalanceSheetStatementGrowth[]           balanceSheetStatementGrowth
 * @property FinancialCollection|CashFlowStatementGrowth[]               cashFlowStatementGrowth
 * @property FinancialCollection|KeyMetricsTtm[]                         keyMetricsTtm
 * @property FinancialCollection|KeyMetrics[]                            keyMetrics
 * @property FinancialCollection|FinancialGrowth[]                       financialGrowth
 * @property FinancialCollection|Rating[]                                rating
 * @property FinancialCollection|HistoricalRating[]                      historicalRating
 * @property FinancialCollection|DiscountedCashFlow[]                    discountedCashFlow
 * @property FinancialCollection|HistoricalDiscountedCashFlowStatement[] historicalDiscountedCashFlowStatement
 * @property FinancialCollection|HistoricalDailyDiscountedCashFlow[]     historicalDailyDiscountedCashFlow
 * @property FinancialCollection|Profile[]                               profile
 * @property FinancialCollection|KeyExecutives[]                         keyExecutives
 * @property FinancialCollection|MarketCapitalization[]                  marketCapitalization
 * @property FinancialCollection|HistoricalMarketCapitalization[]        historicalMarketCapitalization
 * @property FinancialCollection|PressReleases[]                         pressReleases
 * @property FinancialCollection|Grade[]                                 grade
 * @property FinancialCollection|EarningsSurprises[]                     earningsSurprises
 * @property FinancialCollection|AnalystEstimates[]                      analystEstimates
 * @property FinancialCollection|Quote[]                                 quote
 * @property FinancialCollection|QuoteShort[]                            quoteShort
 * @property FinancialCollection|HistoricalPriceFull[]                   historicalPriceFull
 */
class ParsedFinancialRecords implements Arrayable {
    public function __construct(protected object $data) {
        $this->generateCollections();
    }

    public function toArray(): array {
        $res = [];
        foreach ($this as $k => $v) {
            if ($k === 'data') {
                continue;
            }

            $res[$k] = $v->toArray();
        }

        return $res;
    }

    protected static function parseEntityName(string $objectName): string {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', mb_strtolower($objectName))));
    }

    protected static function getEntityClass(string $entityName): string {
        return 'FoldingMoney\Domains\FinancialRecords\Entities\\'.$entityName;
    }

    protected function generateCollections(): void {
        foreach (FinancialDataEnum::cases() as $case) {
            $parsedName = self::parseEntityName($case->name);
            $class      = self::getEntityClass($parsedName);
            $property   = lcfirst($parsedName);
            $data       = $this->data->{$case->name};

            if ($case === FinancialDataEnum::HISTORICAL_PRICE_FULL) {
                $data = $data->historical;
            }

            $collection = new FinancialCollection();
            foreach ($data as $item) {
                $collection->add(new $class($item));
            }

            $this->{$property} = $collection;
        }
    }
}
