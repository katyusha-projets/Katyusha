<?php

namespace FoldingMoney\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use FoldingMoney\Domains\Tickers\Ticker;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use FoldingMoney\Domains\FinancialRecords\FinancialRecords;
use Illuminate\Contracts\Queue\ShouldBeUniqueUntilProcessing;

class ImportTickerData implements ShouldQueue, ShouldBeUniqueUntilProcessing {
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $uniqueFor = 3600;

    public function __construct(public Ticker $ticker) {
    }

    public function uniqueId(): string {
        return $this->ticker->id;
    }

    public function handle(): void {
        FinancialRecords::run($this->ticker);
    }
}
