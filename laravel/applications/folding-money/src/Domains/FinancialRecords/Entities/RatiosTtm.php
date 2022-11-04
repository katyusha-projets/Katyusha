<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property float dividendYielTTM
 * @property float dividendYielPercentageTTM
 * @property float peRatioTTM
 * @property float pegRatioTTM
 * @property float payoutRatioTTM
 * @property float currentRatioTTM
 * @property float quickRatioTTM
 * @property float cashRatioTTM
 * @property float daysOfSalesOutstandingTTM
 * @property float daysOfInventoryOutstandingTTM
 * @property float operatingCycleTTM
 * @property float daysOfPayablesOutstandingTTM
 * @property float cashConversionCycleTTM
 * @property float grossProfitMarginTTM
 * @property float operatingProfitMarginTTM
 * @property float pretaxProfitMarginTTM
 * @property float netProfitMarginTTM
 * @property float effectiveTaxRateTTM
 * @property float returnOnAssetsTTM
 * @property float returnOnEquityTTM
 * @property float returnOnCapitalEmployedTTM
 * @property float netIncomePerEBTTTM
 * @property float ebtPerEbitTTM
 * @property float ebitPerRevenueTTM
 * @property float debtRatioTTM
 * @property float debtEquityRatioTTM
 * @property float longTermDebtToCapitalizationTTM
 * @property float totalDebtToCapitalizationTTM
 * @property float interestCoverageTTM
 * @property float cashFlowToDebtRatioTTM
 * @property float companyEquityMultiplierTTM
 * @property float receivablesTurnoverTTM
 * @property float payablesTurnoverTTM
 * @property float inventoryTurnoverTTM
 * @property float fixedAssetTurnoverTTM
 * @property float assetTurnoverTTM
 * @property float operatingCashFlowPerShareTTM
 * @property float freeCashFlowPerShareTTM
 * @property float cashPerShareTTM
 * @property float operatingCashFlowSalesRatioTTM
 * @property float freeCashFlowOperatingCashFlowRatioTTM
 * @property float cashFlowCoverageRatiosTTM
 * @property float shortTermCoverageRatiosTTM
 * @property float capitalExpenditureCoverageRatioTTM
 * @property float dividendPaidAndCapexCoverageRatioTTM
 * @property float priceBookValueRatioTTM
 * @property float priceToBookRatioTTM
 * @property float priceToSalesRatioTTM
 * @property float priceEarningsRatioTTM
 * @property float priceToFreeCashFlowsRatioTTM
 * @property float priceToOperatingCashFlowsRatioTTM
 * @property float priceCashFlowRatioTTM
 * @property float priceEarningsToGrowthRatioTTM
 * @property float priceSalesRatioTTM
 * @property float dividendYieldTTM
 * @property float enterpriseValueMultipleTTM
 * @property float priceFairValueTTM
 * @property float dividendPerShareTTM
 */
final class RatiosTtm extends RecordEntity {
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
