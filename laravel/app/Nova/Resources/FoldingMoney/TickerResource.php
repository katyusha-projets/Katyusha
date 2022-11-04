<?php

namespace App\Nova\Resources\FoldingMoney;

use App\Nova\Form;
use Illuminate\Http\Request;
use App\Nova\Traits\ReadOnlyResource;
use App\Nova\Actions\FollowStockAction;
use FoldingMoney\Domains\Tickers\Ticker;
use App\Nova\Resources\FoldingMoneyResource;

class TickerResource extends FoldingMoneyResource {
    use ReadOnlyResource;

    public static $model  = Ticker::class;
    public static $group  = 'Stocks';
    public static $title  = 'name';
    public static $search = ['ticker', 'name'];

    public function actions(Request $request) {
        return [
            new FollowStockAction()
        ];
    }

    public function fields(Request $request) {
        return Form::make($request)
            ->text('ticker')
            ->text('name')
            ->text('sector')
            ->integer('market_cap')
            ->integer('last_close')
            ->toArray();
    }
}
