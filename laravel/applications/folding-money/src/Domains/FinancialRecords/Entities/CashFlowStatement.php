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
 * @property int netIncome
 * @property int depreciationAndAmortization
 * @property int deferredIncomeTax
 * @property int stockBasedCompensation
 * @property int changeInWorkingCapital
 * @property int accountsReceivables
 * @property int inventory
 * @property int accountsPayables
 * @property int otherWorkingCapital
 * @property int otherNonCashItems
 * @property int netCashProvidedByOperatingActivities
 * @property int investmentsInPropertyPlantAndEquipment
 * @property int acquisitionsNet
 * @property int purchasesOfInvestments
 * @property int salesMaturitiesOfInvestments
 * @property int otherInvestingActivites
 * @property int netCashUsedForInvestingActivites
 * @property int debtRepayment
 * @property int commonStockIssued
 * @property int commonStockRepurchased
 * @property int dividendsPaid
 * @property int otherFinancingActivites
 * @property int netCashUsedProvidedByFinancingActivities
 * @property int effectOfForexChangesOnCash
 * @property int netChangeInCash
 * @property int cashAtEndOfPeriod
 * @property int cashAtBeginningOfPeriod
 * @property int operatingCashFlow
 * @property int capitalExpenditure
 * @property int freeCashFlow
 * @property string link
 * @property string finalLink
 */
final class CashFlowStatement extends RecordEntity {
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
