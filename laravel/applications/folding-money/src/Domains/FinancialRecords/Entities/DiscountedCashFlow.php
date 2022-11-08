<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property float dcf
 * @property float Stock Price
 */
final class DiscountedCashFlow extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
