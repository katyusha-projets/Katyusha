<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property object date
 * @property string symbol
 * @property string period
 * @property int liabilitiesandstockholdersequity
 * @property int liabilities
 * @property int liabilitiescurrent
 * @property int commonstocksharesauthorized
 * @property int cashandcashequivalentsatcarryingvalue
 * @property int retainedearningsaccumulateddeficit
 * @property int liabilitiesnoncurrent
 * @property int propertyplantandequipmentnet
 * @property int commonstocksincludingadditionalpaidincapital
 * @property int commercialpaper
 * @property int longtermdebtcurrent
 * @property int commonstocksharesoutstanding
 * @property int otherliabilitiesnoncurrent
 * @property int otherliabilitiescurrent
 * @property int assetscurrent
 * @property int longtermdebtnoncurrent
 * @property int contractwithcustomerliabilitycurrent
 * @property int nontradereceivablescurrent
 * @property int commonstocksharesissued
 * @property int stockholdersequity
 * @property int accountsreceivablenetcurrent
 * @property int accountspayablecurrent
 * @property int assets
 * @property int marketablesecuritiescurrent
 * @property int assetsnoncurrent
 * @property int otherassetscurrent
 * @property int otherassetsnoncurrent
 * @property int inventorynet
 * @property int marketablesecuritiesnoncurrent
 * @property int accumulatedothercomprehensiveincomelossnetoftax
 */
final class BalanceSheetStatementAsReported extends RecordEntity {
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
