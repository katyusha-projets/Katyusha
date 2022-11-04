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
 * @property int revenue
 * @property int costOfRevenue
 * @property int grossProfit
 * @property float grossProfitRatio
 * @property int researchAndDevelopmentExpenses
 * @property int generalAndAdministrativeExpenses
 * @property int sellingAndMarketingExpenses
 * @property int sellingGeneralAndAdministrativeExpenses
 * @property int otherExpenses
 * @property int operatingExpenses
 * @property int costAndExpenses
 * @property int interestIncome
 * @property int interestExpense
 * @property int depreciationAndAmortization
 * @property int ebitda
 * @property float ebitdaratio
 * @property int operatingIncome
 * @property float operatingIncomeRatio
 * @property int totalOtherIncomeExpensesNet
 * @property int incomeBeforeTax
 * @property float incomeBeforeTaxRatio
 * @property int incomeTaxExpense
 * @property int netIncome
 * @property float netIncomeRatio
 * @property float eps
 * @property float epsdiluted
 * @property int weightedAverageShsOut
 * @property int weightedAverageShsOutDil
 * @property string link
 * @property string finalLink
 */
final class IncomeStatement extends RecordEntity {
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
