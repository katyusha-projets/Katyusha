<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property string period
 * @property string linkXlsx
 * @property null linkJson
 */
final class FinancialReportsDates extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
