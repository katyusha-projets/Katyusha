<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property string period
 * @property float currentRatio
 * @property float quickRatio
 * @property float cashRatio
 * @property float daysOfSalesOutstanding
 * @property float daysOfInventoryOutstanding
 * @property float operatingCycle
 * @property float daysOfPayablesOutstanding
 * @property float cashConversionCycle
 * @property float grossProfitMargin
 * @property float operatingProfitMargin
 * @property float pretaxProfitMargin
 * @property float netProfitMargin
 * @property float effectiveTaxRate
 * @property float returnOnAssets
 * @property float returnOnEquity
 * @property float returnOnCapitalEmployed
 * @property float netIncomePerEBT
 * @property float ebtPerEbit
 * @property float ebitPerRevenue
 * @property float debtRatio
 * @property float debtEquityRatio
 * @property float longTermDebtToCapitalization
 * @property float totalDebtToCapitalization
 * @property null interestCoverage
 * @property float cashFlowToDebtRatio
 * @property float companyEquityMultiplier
 * @property float receivablesTurnover
 * @property float payablesTurnover
 * @property float inventoryTurnover
 * @property float fixedAssetTurnover
 * @property float assetTurnover
 * @property float operatingCashFlowPerShare
 * @property float freeCashFlowPerShare
 * @property float cashPerShare
 * @property float payoutRatio
 * @property float operatingCashFlowSalesRatio
 * @property float freeCashFlowOperatingCashFlowRatio
 * @property float cashFlowCoverageRatios
 * @property float shortTermCoverageRatios
 * @property float capitalExpenditureCoverageRatio
 * @property float dividendPaidAndCapexCoverageRatio
 * @property float dividendPayoutRatio
 * @property float priceBookValueRatio
 * @property float priceToBookRatio
 * @property float priceToSalesRatio
 * @property float priceEarningsRatio
 * @property float priceToFreeCashFlowsRatio
 * @property float priceToOperatingCashFlowsRatio
 * @property float priceCashFlowRatio
 * @property float priceEarningsToGrowthRatio
 * @property float priceSalesRatio
 * @property float dividendYield
 * @property float enterpriseValueMultiple
 * @property float priceFairValue
 */
final class Ratios extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
