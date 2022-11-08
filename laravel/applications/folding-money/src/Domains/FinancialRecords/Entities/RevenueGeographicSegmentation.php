<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property int CHINA
 * @property int Other Countries
 * @property int UNITED STATES
 * @property object date
 */
final class RevenueGeographicSegmentation extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
