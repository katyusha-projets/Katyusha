<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property object date
 * @property string symbol
 * @property string reportedCurrency
 * @property string cik
 * @property object fillingDate
 * @property object acceptedDate
 * @property int calendarYear
 * @property string period
 * @property int cashAndCashEquivalents
 * @property int shortTermInvestments
 * @property int cashAndShortTermInvestments
 * @property int netReceivables
 * @property int inventory
 * @property int otherCurrentAssets
 * @property int totalCurrentAssets
 * @property int propertyPlantEquipmentNet
 * @property int goodwill
 * @property int intangibleAssets
 * @property int goodwillAndIntangibleAssets
 * @property int longTermInvestments
 * @property int taxAssets
 * @property int otherNonCurrentAssets
 * @property int totalNonCurrentAssets
 * @property int otherAssets
 * @property int totalAssets
 * @property int accountPayables
 * @property int shortTermDebt
 * @property int taxPayables
 * @property int deferredRevenue
 * @property int otherCurrentLiabilities
 * @property int totalCurrentLiabilities
 * @property int longTermDebt
 * @property int deferredRevenueNonCurrent
 * @property int deferredTaxLiabilitiesNonCurrent
 * @property int otherNonCurrentLiabilities
 * @property int totalNonCurrentLiabilities
 * @property int otherLiabilities
 * @property int capitalLeaseObligations
 * @property int totalLiabilities
 * @property int preferredStock
 * @property int commonStock
 * @property int retainedEarnings
 * @property int accumulatedOtherComprehensiveIncomeLoss
 * @property int othertotalStockholdersEquity
 * @property int totalStockholdersEquity
 * @property int totalLiabilitiesAndStockholdersEquity
 * @property int minorityInterest
 * @property int totalEquity
 * @property int totalLiabilitiesAndTotalEquity
 * @property int totalInvestments
 * @property int totalDebt
 * @property int netDebt
 * @property string link
 * @property string finalLink
 */
final class HistoricalPriceFull extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
