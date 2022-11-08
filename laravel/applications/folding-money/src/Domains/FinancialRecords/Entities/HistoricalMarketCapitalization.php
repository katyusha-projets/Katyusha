<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property int marketCap
 */
final class HistoricalMarketCapitalization extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
