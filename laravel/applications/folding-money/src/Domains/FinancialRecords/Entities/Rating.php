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
final class Rating extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
