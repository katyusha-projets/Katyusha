<?php

namespace FoldingMoney\Domains\FinancialRecords;

use stdClass;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Arrayable;
use FoldingMoney\Domains\FinancialRecords\Entities\Rating;
use FoldingMoney\Domains\FinancialRecords\Entities\Ratios;
use FoldingMoney\Domains\FinancialRecords\Entities\KeyMetrics;
use FoldingMoney\Domains\FinancialRecords\Entities\FinancialGrowth;
use FoldingMoney\Domains\FinancialRecords\Entities\EnterpriseValues;
use FoldingMoney\Domains\FinancialRecords\Entities\MarketCapitalization;
use FoldingMoney\Domains\FinancialRecords\Entities\BalanceSheetStatement;
use FoldingMoney\Domains\FinancialRecords\Entities\IncomeStatementGrowth;
use FoldingMoney\Domains\FinancialRecords\Entities\RevenueProductSegmentation;
use FoldingMoney\Domains\FinancialRecords\Entities\BalanceSheetStatementGrowth;

/**
 * @property FinancialCollection|BalanceSheetStatement[]                 balanceSheetStatement
 * @property FinancialCollection|RevenueProductSegmentation[]            revenueProductSegmentation
 * @property FinancialCollection|BalanceSheetStatementGrowth[]           balanceSheetStatementGrowth
 * @property FinancialCollection|EnterpriseValues[]                      enterpriseValues
 * @property FinancialCollection|IncomeStatementGrowth[]                 incomeStatementGrowth
 * @property FinancialCollection|KeyMetrics[]                            keyMetrics
 * @property FinancialCollection|FinancialGrowth[]                       financialGrowth
 * @property FinancialCollection|Rating[]                                rating
 * @property FinancialCollection|MarketCapitalization[]                  marketCapitalization
 * @property FinancialCollection|Ratios[]                                ratios
 */

class KeyFinancialData implements Arrayable {
    protected Collection $collections;
    protected array $collectionKeys = [
        'balanceSheetStatement',
        'revenueProductSegmentation',
        'balanceSheetStatementGrowth',
        'enterpriseValues',
        'incomeStatementGrowth',
        'keyMetrics',
        'financialGrowth',
        'rating',
        'marketCapitalization',
        'ratios',
    ];

    public function __construct(
        public FinancialCollection $balanceSheetStatement,
        public FinancialCollection $revenueProductSegmentation,
        public FinancialCollection $balanceSheetStatementGrowth,
        public FinancialCollection $enterpriseValues,
        public FinancialCollection $incomeStatementGrowth,
        public FinancialCollection $keyMetrics,
        public FinancialCollection $financialGrowth,
        public FinancialCollection $rating,
        public FinancialCollection $marketCapitalization,
        public FinancialCollection $ratios,
    ) {
        $this->collections = new Collection();
        $this->collections->add($balanceSheetStatement);
        $this->collections->add($revenueProductSegmentation);
        $this->collections->add($balanceSheetStatementGrowth);
        $this->collections->add($enterpriseValues);
        $this->collections->add($incomeStatementGrowth);
        $this->collections->add($keyMetrics);
        $this->collections->add($financialGrowth);
        $this->collections->add($rating);
        $this->collections->add($marketCapitalization);
        $this->collections->add($marketCapitalization);
    }

    public function toArray() {
        $res = [];
        foreach ($this->collectionKeys as $key) {
            $res[$key] = $this->{$key};
        }

        return $res;
    }

    protected function iterate(callable $callable): stdClass {
        $res = new stdClass();
        foreach ($this->collectionKeys as $key) {
            $res->{$key} = $callable($this->{$key});
        }

        return $res;
    }

    public function latestValues(): object {
        return $this->_groupByYear()->sortByDesc('year')->first();
    }

    public function groupByYear(): object {
        $res = new stdClass();
        foreach ($this->_groupByYear() as $item) {
            $res->{$item->year} = $item;
        }

        return $res;
    }

    public function _groupByYear(): Collection {
        $groupByYearFn = static function (FinancialCollection $collection) {
            $years = [];
            foreach ($collection->groupBy('year') as $yearGrouped) {
                $desiredItem               = $yearGrouped->sortByDesc('month')->first();
                $years[$desiredItem->year] = $desiredItem;
            }

            return $years;
        };

        $years                    = [];
        $collectionsGroupedByYear = $this->iterate($groupByYearFn);
        foreach ($collectionsGroupedByYear as $financialRecordKey => $items) {
            foreach ($items as $i) {
                $year = $i->year;

                if (!isset($years[$year])) {
                    $years[$year] = new stdClass();
                }
                $years[$year]->{$financialRecordKey} = $i;
            }
        }

        $collection = new Collection();
        foreach ($years as $year => $data) {
            $data->year = $year;
            $collection->add($data);
        }

        return $collection;
    }
}
