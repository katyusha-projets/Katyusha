<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property string period
 * @property float revenuePerShare
 * @property float netIncomePerShare
 * @property float operatingCashFlowPerShare
 * @property float freeCashFlowPerShare
 * @property float cashPerShare
 * @property float bookValuePerShare
 * @property float tangibleBookValuePerShare
 * @property float shareholdersEquityPerShare
 * @property float interestDebtPerShare
 * @property int marketCap
 * @property int enterpriseValue
 * @property float peRatio
 * @property float priceToSalesRatio
 * @property float pocfratio
 * @property float pfcfRatio
 * @property float pbRatio
 * @property float ptbRatio
 * @property float evToSales
 * @property float enterpriseValueOverEBITDA
 * @property float evToOperatingCashFlow
 * @property float evToFreeCashFlow
 * @property float earningsYield
 * @property float freeCashFlowYield
 * @property float debtToEquity
 * @property float debtToAssets
 * @property float netDebtToEBITDA
 * @property float currentRatio
 * @property null interestCoverage
 * @property float incomeQuality
 * @property float dividendYield
 * @property float payoutRatio
 * @property int salesGeneralAndAdministrativeToRevenue
 * @property float researchAndDdevelopementToRevenue
 * @property int intangiblesToTotalAssets
 * @property float capexToOperatingCashFlow
 * @property float capexToRevenue
 * @property float capexToDepreciation
 * @property float stockBasedCompensationToRevenue
 * @property float grahamNumber
 * @property float roic
 * @property float returnOnTangibleAssets
 * @property float grahamNetNet
 * @property int workingCapital
 * @property null tangibleAssetValue
 * @property int netCurrentAssetValue
 * @property float investedCapital
 * @property int averageReceivables
 * @property int averagePayables
 * @property int averageInventory
 * @property float daysSalesOutstanding
 * @property float daysPayablesOutstanding
 * @property float daysOfInventoryOnHand
 * @property float receivablesTurnover
 * @property float payablesTurnover
 * @property float inventoryTurnover
 * @property float roe
 * @property float capexPerShare
 */
final class KeyMetrics extends RecordEntity {
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
