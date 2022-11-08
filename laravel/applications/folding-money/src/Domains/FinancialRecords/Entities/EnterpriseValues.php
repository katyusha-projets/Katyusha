<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property float stockPrice
 * @property int numberOfShares
 * @property int marketCapitalization
 * @property int minusCashAndCashEquivalents
 * @property int addTotalDebt
 * @property int enterpriseValue
 */
final class EnterpriseValues extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
