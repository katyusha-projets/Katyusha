<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property int quarter
 * @property int year
 * @property object date
 * @property string content
 */
final class EarningCallTranscript extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
