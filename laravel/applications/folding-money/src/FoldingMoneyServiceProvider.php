<?php

namespace FoldingMoney;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use FoldingMoney\Domains\Tickers\Ticker;
use FoldingMoney\Domains\Portfolios\Portfolio;

class FoldingMoneyServiceProvider extends ServiceProvider {
    public function boot(): void {
        $this->mergeConfigFrom(__DIR__.'/../config/folding-money.php', 'folding-money');
        $this->registerRoutes();
    }

    public function register() {
        User::relationshipMacro('portfolios')->hasMany(Portfolio::class);
        User::relationshipMacro('followingPortfolios')->belongsToMany(Portfolio::class, 'finance.portfolio_followers', 'profile_id', 'portfolio_id', 'id');
        User::relationshipMacro('tickersWatching')->belongsToMany(Ticker::class, 'finance.ticker_followers', 'user_id', 'ticker_id', 'id');
    }

    protected function registerRoutes(): void {
        Route::group(['prefix' => 'api'], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        });
    }
}
