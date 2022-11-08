<?php

namespace FoldingMoney\Domains\FinancialRecords;

use MongoDB\BSON\UTCDateTime;
use Illuminate\Contracts\Support\Arrayable;

/**
 * @property int month
 * @property int year
 * @property string monthYear
 */
class RecordEntity implements Arrayable {
    public static function make(object $baseObject): static {
        return new static($baseObject);
    }

    protected function setProperties(): void {
        foreach ($this->baseObject as $k => $v) {
            if (is_object($v)) {
                $vArr = (array) $v;

                if (isset($vArr['$date'])) {
                    $date = (array) $vArr['$date'];
                    $date = $date['$numberLong'];
                    $date = (new UTCDateTime($date))->toDateTime();

                    $this->year      = (int) $date->format('Y');
                    $this->month     = (int) $date->format('m');
                    $this->monthYear = $date->format('m-Y');

                    $v = $date->format('Y-m-d');
                } else {
                    continue;
                }
            }

            $this->{$k} = $v;
        }
    }

    public function toArray() {
        $res = [];
        foreach ($this as $k => $v) {
            if ($k === 'baseObject') {
                continue;
            }

            $res[$k] = $v;
        }

        return $res;
    }
}
