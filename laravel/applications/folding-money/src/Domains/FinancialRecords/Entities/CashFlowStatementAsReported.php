<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property object date
 * @property string symbol
 * @property string period
 * @property int paymentsforrepurchaseofcommonstock
 * @property int sharebasedcompensation
 * @property int netincomeloss
 * @property int increasedecreaseinaccountspayable
 * @property int proceedsfrompaymentsforotherfinancingactivities
 * @property int paymentsrelatedtotaxwithholdingforsharebasedcompensation
 * @property int cashcashequivalentsrestrictedcashandrestrictedcashequivalents
 * @property int othernoncashincomeexpense
 * @property int paymentstoacquirebusinessesnetofcashacquired
 * @property int deferredincometaxexpensebenefit
 * @property int increasedecreaseinotheroperatingliabilities
 * @property int cashcashequivalentsrestrictedcashandrestrictedcashequivalentsperiodincreasedecreaseincludingexchangerateeffect
 * @property int netcashprovidedbyusedinoperatingactivities
 * @property int proceedsfromsaleofavailableforsalesecuritiesdebt
 * @property int repaymentsoflongtermdebt
 * @property int incometaxespaidnet
 * @property int proceedsfromissuanceoflongtermdebt
 * @property int netcashprovidedbyusedininvestingactivities
 * @property int increasedecreaseincontractwithcustomerliability
 * @property int interestpaidnet
 * @property int netcashprovidedbyusedinfinancingactivities
 * @property int proceedsfromrepaymentsofcommercialpaper
 * @property int paymentstoacquireavailableforsalesecuritiesdebt
 * @property int paymentstoacquirepropertyplantandequipment
 * @property int paymentsforproceedsfromotherinvestingactivities
 * @property int increasedecreaseinotherreceivables
 * @property int paymentsofdividends
 * @property int increasedecreaseininventories
 * @property int increasedecreaseinaccountsreceivable
 * @property int depreciationdepletionandamortization
 * @property int proceedsfrommaturitiesprepaymentsandcallsofavailableforsalesecurities
 * @property int increasedecreaseinotheroperatingassets
 */
final class CashFlowStatementAsReported extends RecordEntity {
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
