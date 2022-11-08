<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property string symbol
 * @property float price
 * @property float beta
 * @property int volAvg
 * @property int mktCap
 * @property float lastDiv
 * @property string range
 * @property float changes
 * @property string companyName
 * @property string currency
 * @property string cik
 * @property string isin
 * @property string cusip
 * @property string exchange
 * @property string exchangeShortName
 * @property string industry
 * @property string website
 * @property string description
 * @property string ceo
 * @property string sector
 * @property string country
 * @property string fullTimeEmployees
 * @property string phone
 * @property string address
 * @property string city
 * @property string state
 * @property string zip
 * @property float dcfDiff
 * @property float dcf
 * @property string image
 * @property object ipoDate
 * @property bool defaultImage
 * @property bool isEtf
 * @property bool isActivelyTrading
 * @property bool isAdr
 * @property bool isFund
 */
final class Profile extends RecordEntity {
    public function __construct(protected object $baseObject) {
        $this->setProperties();
    }
}
