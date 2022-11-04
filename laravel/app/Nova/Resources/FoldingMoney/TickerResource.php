<?php

namespace App\Nova\Resources\FoldingMoney;

use App\Nova\Form;
use Illuminate\Http\Request;
use App\Nova\Traits\ReadOnlyResource;
use App\Nova\Actions\FollowStockAction;
use FoldingMoney\Domains\Tickers\Ticker;
use App\Nova\Resources\FoldingMoneyResource;
use DigitalCreative\NovaDataTable\NovaDataTable;
use DigitalCreative\NovaDataTable\Columns\Columns;

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

    public function cards(Request $request) {
        return [
            (new NovaDataTable())
                ->onlyOnDetail()
                ->columns(
                    [
                        new Columns('Name', 'name'),
                        new Columns('Age', 'age'),
                        new Columns('Address', 'address'),
                    ]
                )->data([
                    [
                        'name'    => 'Richard Needham',
                        'address' => '9293 South Peachtree Drive Rahway, NJ 07065',
                        'age'     => 18
                    ],
                    [
                        'name'    => 'Cari Mckenzie',
                        'address' => '8478 Tallwood St.Far Rockaway, NY 11691',
                        'age'     => 24,
                    ],
                    [
                        'name'    => 'Daniella Connor',
                        'address' => '7674 Hilltop Road Mcdonough, GA 30252',
                        'age'     => 33
                    ],
                    [
                        'name'    => 'Lamar Mac',
                        'address' => '67 Thorne Circle New Brunswick, NJ 08901',
                        'age'     => 44
                    ]
                ])
                ->rowLabels([
                    'Label1',
                    'Label2',
                    'Label2',
                    'Label3',
                ])
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
