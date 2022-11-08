<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property string title
 * @property string text
 */
final class PressReleases extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
