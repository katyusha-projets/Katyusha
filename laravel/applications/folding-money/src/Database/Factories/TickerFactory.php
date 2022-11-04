<?php

namespace FoldingMoney\Database\Factories;

use FoldingMoney\Domains\Tickers\Ticker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TickerFactory extends Factory {
    protected $model = Ticker::class;

    public function definition(): array {
        return [
            'name'          => 'Apple',
            'ticker'        => 'AAPL',
            'description'   => 'The best devices <3',
            'exchange'      => 'NYSE',
            'sector'        => 'Tech',
            'industry'      => 'Tech! <3',
            'market_cap'    => 10000000000,
            'last_close'    => 34
        ];
    }
}
