<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property string gradingCompany
 * @property string previousGrade
 * @property string newGrade
 */
final class Grade extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
