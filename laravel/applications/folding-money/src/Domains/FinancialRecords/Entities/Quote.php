<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property string name
 * @property float price
 * @property float changesPercentage
 * @property float change
 * @property float dayLow
 * @property float dayHigh
 * @property int yearHigh
 * @property int yearLow
 * @property int marketCap
 * @property float priceAvg50
 * @property float priceAvg200
 * @property int volume
 * @property int avgVolume
 * @property string exchange
 * @property float open
 * @property float previousClose
 * @property float eps
 * @property float pe
 * @property string earningsAnnouncement
 * @property int sharesOutstanding
 * @property int timestamp
 */
final class Quote extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }

        protected function setProperties(): void {
            foreach ($this->baseObject as $k => $v) {
                $this->{$k} = $v;
            }
        }

        public static function make(object $baseObject): self {
            return new self($baseObject);
        }
}
