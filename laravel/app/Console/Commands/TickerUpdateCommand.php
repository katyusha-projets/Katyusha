<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use FoldingMoney\Domains\Tickers\Ticker;
use FoldingMoney\Domains\FinancialRecords\FinancialRecords;

class TickerUpdateCommand extends Command {
    protected  $signature   = 'ticker';
    protected  $description = 'Command description';

    public function handle() {
        FinancialRecords::run('aapl');
//        Ticker::createUpdatingJobs();
    }
}
