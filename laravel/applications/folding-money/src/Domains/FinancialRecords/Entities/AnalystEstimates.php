<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property int estimatedRevenueLow
 * @property int estimatedRevenueHigh
 * @property int estimatedRevenueAvg
 * @property int estimatedEbitdaLow
 * @property int estimatedEbitdaHigh
 * @property int estimatedEbitdaAvg
 * @property int estimatedEbitLow
 * @property int estimatedEbitHigh
 * @property int estimatedEbitAvg
 * @property int estimatedNetIncomeLow
 * @property int estimatedNetIncomeHigh
 * @property int estimatedNetIncomeAvg
 * @property int estimatedSgaExpenseLow
 * @property int estimatedSgaExpenseHigh
 * @property int estimatedSgaExpenseAvg
 * @property float estimatedEpsAvg
 * @property float estimatedEpsHigh
 * @property float estimatedEpsLow
 * @property int numberAnalystEstimatedRevenue
 * @property int numberAnalystsEstimatedEps
 */
final class AnalystEstimates extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }

        protected function setProperties(): void {
            foreach ($this->baseObject as $k => $v) {
                $this->{$k} = $v;
            }
        }

        public static function make(object $baseObject): self {
            return new self($baseObject);
        }
}
