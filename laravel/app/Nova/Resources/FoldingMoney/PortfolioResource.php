<?php

namespace App\Nova\Resources\FoldingMoney;

use App\Nova\Form;
use Illuminate\Http\Request;
use App\Nova\Traits\BelongsToUser;
use App\Nova\Resources\FoldingMoneyResource;
use FoldingMoney\Domains\Portfolios\Portfolio;

class PortfolioResource extends FoldingMoneyResource {
    use BelongsToUser;

    public static $model  = Portfolio::class;
    public static $group  = 'Stocks';
    public static $title  = 'name';
    public static $search = ['name'];

    public function fields(Request $request) {
        return Form::make($request)
            ->text('name')
//            ->displayOwner()
            ->belongsToMany('Tickers', TickerResource::class)
            ->toArray();
    }
}
