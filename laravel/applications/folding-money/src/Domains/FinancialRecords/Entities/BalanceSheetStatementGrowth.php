<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property object date
 * @property string symbol
 * @property string period
 * @property float growthCashAndCashEquivalents
 * @property float growthShortTermInvestments
 * @property float growthCashAndShortTermInvestments
 * @property float growthNetReceivables
 * @property float growthInventory
 * @property float growthOtherCurrentAssets
 * @property float growthTotalCurrentAssets
 * @property float growthPropertyPlantEquipmentNet
 * @property int growthGoodwill
 * @property int growthIntangibleAssets
 * @property int growthGoodwillAndIntangibleAssets
 * @property float growthLongTermInvestments
 * @property int growthTaxAssets
 * @property float growthOtherNonCurrentAssets
 * @property float growthTotalNonCurrentAssets
 * @property int growthOtherAssets
 * @property float growthTotalAssets
 * @property float growthAccountPayables
 * @property float growthShortTermDebt
 * @property int growthTaxPayables
 * @property float growthDeferredRevenue
 * @property float growthOtherCurrentLiabilities
 * @property float growthTotalCurrentLiabilities
 * @property float growthLongTermDebt
 * @property int growthDeferredRevenueNonCurrent
 * @property int growthDeferrredTaxLiabilitiesNonCurrent
 * @property float growthOtherNonCurrentLiabilities
 * @property float growthTotalNonCurrentLiabilities
 * @property int growthOtherLiabilities
 * @property float growthTotalLiabilities
 * @property float growthCommonStock
 * @property float growthRetainedEarnings
 * @property float growthAccumulatedOtherComprehensiveIncomeLoss
 * @property int growthOthertotalStockholdersEquity
 * @property float growthTotalStockholdersEquity
 * @property float growthTotalLiabilitiesAndStockholdersEquity
 * @property float growthTotalInvestments
 * @property float growthTotalDebt
 * @property float growthNetDebt
 */
final class BalanceSheetStatementGrowth extends RecordEntity {
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
