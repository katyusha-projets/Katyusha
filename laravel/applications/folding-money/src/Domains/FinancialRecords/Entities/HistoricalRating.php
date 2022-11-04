<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property object date
 * @property string rating
 * @property int ratingScore
 * @property string ratingRecommendation
 * @property int ratingDetailsDCFScore
 * @property string ratingDetailsDCFRecommendation
 * @property int ratingDetailsROEScore
 * @property string ratingDetailsROERecommendation
 * @property int ratingDetailsROAScore
 * @property string ratingDetailsROARecommendation
 * @property int ratingDetailsDEScore
 * @property string ratingDetailsDERecommendation
 * @property int ratingDetailsPEScore
 * @property string ratingDetailsPERecommendation
 * @property int ratingDetailsPBScore
 * @property string ratingDetailsPBRecommendation
 */
final class HistoricalRating extends RecordEntity {
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
