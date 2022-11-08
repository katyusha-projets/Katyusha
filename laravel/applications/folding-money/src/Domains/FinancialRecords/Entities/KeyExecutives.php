<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string title
 * @property string name
 * @property null pay
 * @property string currencyPay
 * @property string gender
 * @property int yearBorn
 * @property null titleSince
 */
final class KeyExecutives extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
