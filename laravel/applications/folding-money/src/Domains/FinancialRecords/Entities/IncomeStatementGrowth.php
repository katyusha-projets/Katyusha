<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property object date
 * @property string symbol
 * @property string period
 * @property float growthRevenue
 * @property float growthCostOfRevenue
 * @property float growthGrossProfit
 * @property float growthGrossProfitRatio
 * @property float growthResearchAndDevelopmentExpenses
 * @property int growthGeneralAndAdministrativeExpenses
 * @property int growthSellingAndMarketingExpenses
 * @property int growthOtherExpenses
 * @property float growthOperatingExpenses
 * @property float growthCostAndExpenses
 * @property int growthInterestExpense
 * @property float growthDepreciationAndAmortization
 * @property float growthEBITDA
 * @property float growthEBITDARatio
 * @property float growthOperatingIncome
 * @property float growthOperatingIncomeRatio
 * @property float growthTotalOtherIncomeExpensesNet
 * @property float growthIncomeBeforeTax
 * @property float growthIncomeBeforeTaxRatio
 * @property float growthIncomeTaxExpense
 * @property float growthNetIncome
 * @property float growthNetIncomeRatio
 * @property float growthEPS
 * @property float growthEPSDiluted
 * @property float growthWeightedAverageShsOut
 * @property float growthWeightedAverageShsOutDil
 */
final class IncomeStatementGrowth extends RecordEntity {
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
