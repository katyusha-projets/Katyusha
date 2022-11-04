<?php

namespace FoldingMoney\Domains\Tickers;

use Katyusha\Infrastructure\Eloquent\Builder;

class TickerBuilder extends Builder {
    public function whereTicker(string $ticker): static {
        return $this->where('ticker', mb_strtoupper($ticker));
    }

    public function whereHasFullData(): static {
        return $this->has('balanceSheets')->has('cashflowStatements')->has('historicalPrices')->has('incomeStatements');
    }

    public function withAllData(): static {
        return $this
            ->with('indexes')
            ->with('balanceSheets')
            ->with('cashflowStatements')
            ->with('historicalPrices')
            ->with('incomeStatements');
    }
}
