<?php

namespace FoldingMoney\Domains\Tickers;

use Carbon\Carbon;
use App\Models\User;
use FoldingMoney\Jobs\ImportTickerData;
use Katyusha\Infrastructure\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\Followable;
use FoldingMoney\Domains\Portfolios\Portfolio;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use Katyusha\Infrastructure\Eloquent\Collection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use FoldingMoney\Database\Factories\TickerFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use FoldingMoney\Domains\FinancialRecords\FinancialRecords;
use FoldingMoney\Domains\Tickers\Collections\TickersCollection;

/**
 * @property string name
 * @property string description
 * @property string exchange
 * @property string sector
 * @property string industry
 * @property string logo
 * @property string                         ceo
 * @property string                         short_name
 * @property string                         website
 * @property string                         market_cap
 * @property string                         tag_1
 * @property string                         tag_2
 * @property string                         ticker
 * @property Carbon last_api_fetch
 * @property float                          last_close
 * @property Collection|Portfolio[]         portfolios
 *
 * @method TickerBuilder query()
 */
class Ticker extends Model {
    use HasFactory;
    use Followable;
    use HybridRelations;

    protected $table = 'finance.tickers';
    protected $dates = ['last_api_fetch'];

    public function newEloquentBuilder($query): TickerBuilder {
        return new TickerBuilder($query);
    }

    public function newCollection(array $models = []): TickersCollection {
        return new TickersCollection($models);
    }

    protected static function newFactory(): TickerFactory {
        return TickerFactory::new();
    }

    public function logo(): Attribute {
        return Attribute::make(get: static fn (?string $value) => config('app.url').'/applications/folding-money/logos/'.$value);
    }

    public static function getByTicker(string $ticker): self {
        return self::where('ticker', mb_strtoupper($ticker))->first();
    }

    public static function createUpdatingJobs(): void {
        foreach (self::query()->orderByDesc('market_cap')->limit(1000)->get() as $item) {
            ImportTickerData::dispatch($item);
        }
    }

    public function followers(): BelongsToMany {
        return $this->belongsToMany(User::class, 'finance.ticker_followers');
    }

    public function portfolios(): BelongsToMany {
        return $this->belongsToMany(Portfolio::class, 'finance.portfolio_tickers');
    }

    public function financialRecords(): HasOne {
        return $this->hasOne(FinancialRecords::class, 'id', 'id');
    }
}
