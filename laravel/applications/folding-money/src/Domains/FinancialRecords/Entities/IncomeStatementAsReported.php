<?php

namespace FoldingMoney\Domains\FinancialRecords\Entities;

use FoldingMoney\Domains\FinancialRecords\RecordEntity;

/**
 * @property object date
 * @property string symbol
 * @property string period
 * @property int costofgoodsandservicessold
 * @property int netincomeloss
 * @property int researchanddevelopmentexpense
 * @property int grossprofit
 * @property int othercomprehensiveincomelossreclassificationadjustmentfromaociforsaleofsecuritiesnetoftax
 * @property int othercomprehensiveincomelossavailableforsalesecuritiesadjustmentnetoftax
 * @property int othercomprehensiveincomelossderivativeinstrumentgainlossbeforereclassificationaftertax
 * @property int othercomprehensiveincomelossforeigncurrencytransactionandtranslationadjustmentnetoftax
 * @property int weightedaveragenumberofdilutedsharesoutstanding
 * @property int weightedaveragenumberofsharesoutstandingbasic
 * @property int operatingincomeloss
 * @property int nonoperatingincomeexpense
 * @property int incomelossfromcontinuingoperationsbeforeincometaxesextraordinaryitemsnoncontrollinginterest
 * @property float earningspersharebasic
 * @property int incometaxexpensebenefit
 * @property int othercomprehensiveincomeunrealizedholdinggainlossonsecuritiesarisingduringperiodnetoftax
 * @property int revenuefromcontractwithcustomerexcludingassessedtax
 * @property float earningspersharediluted
 * @property int operatingexpenses
 * @property int othercomprehensiveincomelossderivativeinstrumentgainlossafterreclassificationandtax
 * @property int sellinggeneralandadministrativeexpense
 * @property int othercomprehensiveincomelossderivativeinstrumentgainlossreclassificationaftertax
 * @property int othercomprehensiveincomelossnetoftaxportionattributabletoparent
 * @property int comprehensiveincomenetoftax
 */
final class IncomeStatementAsReported extends RecordEntity {
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
