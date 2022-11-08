<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property object date
 * @property string symbol
 * @property float actualEarningResult
 * @property float estimatedEarning
 */
final class EarningsSurprises extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
