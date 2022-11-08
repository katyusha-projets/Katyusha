<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property float price
 * @property int volume
 */
final class QuoteShort extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
