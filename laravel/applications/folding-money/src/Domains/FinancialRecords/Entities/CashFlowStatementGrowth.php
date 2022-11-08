<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property object date
 * @property string symbol
 * @property string period
 * @property float growthNetIncome
 * @property float growthDepreciationAndAmortization
 * @property float growthDeferredIncomeTax
 * @property float growthStockBasedCompensation
 * @property float growthChangeInWorkingCapital
 * @property float growthAccountsReceivables
 * @property float growthInventory
 * @property float growthAccountsPayables
 * @property int growthOtherWorkingCapital
 * @property int growthOtherNonCashItems
 * @property float growthNetCashProvidedByOperatingActivites
 * @property float growthInvestmentsInPropertyPlantAndEquipment
 * @property float growthAcquisitionsNet
 * @property float growthPurchasesOfInvestments
 * @property float growthSalesMaturitiesOfInvestments
 * @property float growthOtherInvestingActivites
 * @property float growthNetCashUsedForInvestingActivites
 * @property float growthDebtRepayment
 * @property int growthCommonStockIssued
 * @property float growthCommonStockRepurchased
 * @property float growthDividendsPaid
 * @property float growthOtherFinancingActivites
 * @property float growthNetCashUsedProvidedByFinancingActivities
 * @property int growthEffectOfForexChangesOnCash
 * @property float growthNetChangeInCash
 * @property float growthCashAtEndOfPeriod
 * @property float growthCashAtBeginningOfPeriod
 * @property float growthOperatingCashFlow
 * @property float growthCapitalExpenditure
 * @property float growthFreeCashFlow
 */
final class CashFlowStatementGrowth extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
