<?php

namespace FoldingMoney\Domains\FinancialRecords;

use Illuminate\Contracts\Support\Arrayable;

class FinancialRecordsCharts implements Arrayable {
    public function __construct(protected ParsedFinancialRecords $records) {
    }
}
