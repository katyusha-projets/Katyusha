<?php

namespace FoldingMoney\Domains\Portfolios;

use stdClass;
use App\Models\User;
use Katyusha\Infrastructure\Support\_;
use FoldingMoney\Domains\Tickers\Ticker;
use Katyusha\Infrastructure\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\Followable;
use Katyusha\Infrastructure\Eloquent\Collection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Katyusha\Infrastructure\Eloquent\Traits\ModelHasNamespaceTrait;

/**
 * @property string  user_id
 * @property string  name
 * @property string  namespace
 * @property User user
 * @property Ticker[]|Collection tickers
 * @property User[]|Collection followers
 */
class Portfolio extends Model {
    use ModelHasNamespaceTrait;
    use Followable;

    protected $table   = 'finance.portfolios';
    protected $guarded = [];
    protected $appends = [];
    protected $with    = ['tickers'];

    public function image(): Attribute {
        return Attribute::make(get: static fn (?string $value) => self::mediaUrl($value));
    }

    public function getMarketCapAttribute(): int {
        return _::arrayPropertySum($this->tickers, 'market_cap');
    }

    public function getTotalsAttribute(): stdClass {
        $dataKeys = ['latestBalanceSheet', 'latestCashflowStatement', 'latestHistoricalPrice', 'latestIncomeStatement'];
        $totals   = new stdClass();

        foreach ($dataKeys as $key) {
            $thisKey             = str_replace('latest', 'total', $key);

            if (!$first = $this->tickers->pluck($key)->first()) {
                continue;
            }

            $data                = $first->toArray();
            $totals->{$thisKey}  = new stdClass();

            foreach ($data as $k => $v) {
                if (!is_int($v)) {
                    continue;
                }

                if (!isset($this->{$thisKey}->{$k})) {
                    $totals->{$thisKey}->{$k} = 0;
                }
                $totals->{$thisKey}->{$k} += $v;
            }
        }

        return $totals;
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function tickers(): BelongsToMany {
        return $this->belongsToMany(Ticker::class, 'finance.portfolio_tickers');
    }
}
