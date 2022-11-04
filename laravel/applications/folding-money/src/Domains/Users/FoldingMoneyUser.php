<?php

namespace FoldingMoney\Domains\Users;

use Overtrue\LaravelFollow\Traits\Follower;
use FoldingMoney\Domains\Portfolios\Portfolio;
use Katyusha\Infrastructure\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property Collection|Portfolio[] portfolios
 * @property Collection|Portfolio[] followingPortfolios
 */
class FoldingMoneyUser extends \App\Models\User {
    use Follower;

    public function followingPortfolios(): BelongsToMany {
        return $this->belongsToMany(Portfolio::class, 'finance.portfolio_followers', 'profile_id', 'portfolio_id', 'id');
    }

    public function portfolios(): HasMany {
        return $this->hasMany(Portfolio::class);
    }
}
