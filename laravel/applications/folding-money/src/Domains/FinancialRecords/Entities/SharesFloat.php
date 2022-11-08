<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property float freeFloat
 * @property int floatShares
 * @property int outstandingShares
 * @property string source
 */
final class SharesFloat extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
