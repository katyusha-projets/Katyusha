<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property float revenuePerShareTTM
 * @property float netIncomePerShareTTM
 * @property float operatingCashFlowPerShareTTM
 * @property float freeCashFlowPerShareTTM
 * @property float cashPerShareTTM
 * @property float bookValuePerShareTTM
 * @property float tangibleBookValuePerShareTTM
 * @property float shareholdersEquityPerShareTTM
 * @property float interestDebtPerShareTTM
 * @property int marketCapTTM
 * @property int enterpriseValueTTM
 * @property float peRatioTTM
 * @property float priceToSalesRatioTTM
 * @property float pocfratioTTM
 * @property float pfcfRatioTTM
 * @property float pbRatioTTM
 * @property float ptbRatioTTM
 * @property float evToSalesTTM
 * @property float enterpriseValueOverEBITDATTM
 * @property float evToOperatingCashFlowTTM
 * @property float evToFreeCashFlowTTM
 * @property float earningsYieldTTM
 * @property float freeCashFlowYieldTTM
 * @property float debtToEquityTTM
 * @property float debtToAssetsTTM
 * @property float netDebtToEBITDATTM
 * @property float currentRatioTTM
 * @property float interestCoverageTTM
 * @property float incomeQualityTTM
 * @property float dividendYieldTTM
 * @property float dividendYieldPercentageTTM
 * @property float payoutRatioTTM
 * @property null salesGeneralAndAdministrativeToRevenueTTM
 * @property float researchAndDevelopementToRevenueTTM
 * @property int intangiblesToTotalAssetsTTM
 * @property float capexToOperatingCashFlowTTM
 * @property float capexToRevenueTTM
 * @property float capexToDepreciationTTM
 * @property float stockBasedCompensationToRevenueTTM
 * @property float grahamNumberTTM
 * @property float roicTTM
 * @property float returnOnTangibleAssetsTTM
 * @property float grahamNetNetTTM
 * @property int workingCapitalTTM
 * @property null tangibleAssetValueTTM
 * @property float netCurrentAssetValueTTM
 * @property float investedCapitalTTM
 * @property int averageReceivablesTTM
 * @property int averagePayablesTTM
 * @property int averageInventoryTTM
 * @property float daysSalesOutstandingTTM
 * @property float daysPayablesOutstandingTTM
 * @property float daysOfInventoryOnHandTTM
 * @property float receivablesTurnoverTTM
 * @property float payablesTurnoverTTM
 * @property float inventoryTurnoverTTM
 * @property float roeTTM
 * @property float capexPerShareTTM
 * @property float dividendPerShareTTM
 * @property float debtToMarketCapTTM
 */
final class KeyMetricsTtm extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
