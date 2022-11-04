<?php

namespace FoldingMoney\Domains\FinancialRecords;

use Illuminate\Support\Collection;

class FinancialCollection extends Collection {
    public function toArray() {
        $res = [];
        foreach ($this as $item) {
            $res[] = $item->toArray();
        }

        return $res;
    }
}
