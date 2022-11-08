<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property int Mac
 * @property int Service
 * @property int Wearables, Home and Accessories
 * @property int iPad
 * @property int iPhone
 * @property object date
 */
final class RevenueProductSegmentation extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
