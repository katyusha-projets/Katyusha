<?php

namespace App\Nova\Resources\FoldingMoney;

use App\Nova\Form;
use App\Models\User;
use Illuminate\Http\Request;
use App\Nova\Resources\FoldingMoneyResource;

class UserResource extends FoldingMoneyResource {
    public static $model               = User::class;
    public static $title               = 'name';

    public function fields(Request $request) {
        return Form::make($request)
            ->text('name')
            ->text('username')
            ->text('tagline')
            ->image('avatar')
            ->image('banner')
            ->hasMany('Portfolios', PortfolioResource::class)
            ->toArray();
    }
}
