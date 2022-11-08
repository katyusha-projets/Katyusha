<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object fillingDate
 * @property object acceptedDate
 * @property string cik
 * @property string type
 * @property string link
 * @property string finalLink
 */
final class SecFilings extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
