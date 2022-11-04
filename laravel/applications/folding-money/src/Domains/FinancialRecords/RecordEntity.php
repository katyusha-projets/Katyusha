<?php

namespace FoldingMoney\Domains\FinancialRecords;

use MongoDB\BSON\UTCDateTime;
use Illuminate\Contracts\Support\Arrayable;

class RecordEntity implements Arrayable {
    public function toArray() {
        $res = [];
        foreach ($this as $k => $v) {
            if ($k === 'baseObject') {
                continue;
            }

            if (is_object($v)) {
                $vArr = (array) $v;

                if (isset($vArr['$date'])) {
                    $date = (array) $vArr['$date'];
                    $date = $date['$numberLong'];
                    $date = new UTCDateTime($date);

                    $v = $date->toDateTime()->format('F/d/Y');
                } else {
                    continue;
                }
            }

            $res[$k] = $v;
        }

        return $res;
    }
}
