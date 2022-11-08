<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property float altmanZScore
 * @property int piotroskiScore
 * @property string workingCapital
 * @property string totalAssets
 * @property string retainedEarnings
 * @property string ebit
 * @property string marketCap
 * @property string totalLiabilities
 * @property string revenue
 */
final class Score extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
