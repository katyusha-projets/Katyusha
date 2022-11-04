<?php

namespace App\Nova\Resources\FoldingMoney;

use App\Nova\Form;
use App\Models\User;
use Illuminate\Http\Request;
use App\Nova\Traits\ReadOnlyResource;
use App\Nova\Resources\FoldingMoneyResource;

class OwnerResource extends FoldingMoneyResource {
    use ReadOnlyResource;

    public static $model               = User::class;
    public static $title               = 'name';
    public static $displayInNavigation = false;

    public function fields(Request $request) {
        return Form::make($request)
            ->text('name')
            ->hasMany('Portfolios', PortfolioResource::class)
            ->toArray();
    }
}
