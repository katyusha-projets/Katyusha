<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property string period
 * @property float revenueGrowth
 * @property float grossProfitGrowth
 * @property float ebitgrowth
 * @property float operatingIncomeGrowth
 * @property float netIncomeGrowth
 * @property float epsgrowth
 * @property float epsdilutedGrowth
 * @property float weightedAverageSharesGrowth
 * @property float weightedAverageSharesDilutedGrowth
 * @property float dividendsperShareGrowth
 * @property float operatingCashFlowGrowth
 * @property float freeCashFlowGrowth
 * @property float tenYRevenueGrowthPerShare
 * @property float fiveYRevenueGrowthPerShare
 * @property float threeYRevenueGrowthPerShare
 * @property float tenYOperatingCFGrowthPerShare
 * @property float fiveYOperatingCFGrowthPerShare
 * @property float threeYOperatingCFGrowthPerShare
 * @property float tenYNetIncomeGrowthPerShare
 * @property float fiveYNetIncomeGrowthPerShare
 * @property float threeYNetIncomeGrowthPerShare
 * @property float tenYShareholdersEquityGrowthPerShare
 * @property float fiveYShareholdersEquityGrowthPerShare
 * @property float threeYShareholdersEquityGrowthPerShare
 * @property float tenYDividendperShareGrowthPerShare
 * @property float fiveYDividendperShareGrowthPerShare
 * @property float threeYDividendperShareGrowthPerShare
 * @property float receivablesGrowth
 * @property float inventoryGrowth
 * @property float assetGrowth
 * @property float bookValueperShareGrowth
 * @property float debtGrowth
 * @property float rdexpenseGrowth
 * @property int sgaexpensesGrowth
 */
final class FinancialGrowth extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
