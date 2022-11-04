<?php

namespace FoldingMoney\Domains\FinancialRecords;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use FoldingMoney\Domains\Tickers\Ticker;
use FoldingMoney\Enums\ReportPeriodsEnum;
use Jenssegers\Mongodb\Relations\BelongsTo;
use FoldingMoney\Api\FinancialModellingPrepApi;
use Katyusha\Infrastructure\Eloquent\MongodbModel;

final class FinancialRecords extends MongodbModel {
    protected $guarded    = [];
    protected $dates      = ['date'];
    protected $connection = 'mongodb';
    protected $primaryKey = 'id';
    protected $collection = 'financial_records';

    protected static function cacheKey(string $ticker): string {
        return 'financial_records:'.mb_strtoupper($ticker);
    }

    public static function fetch(string $ticker): ?ParsedFinancialRecords {
        $cacheKey = self::cacheKey($ticker);

        if ($existing = Cache::get($cacheKey)) {
            return new ParsedFinancialRecords(json_decode($existing));
        }

        $tickerRecord  = Ticker::getByTicker($ticker);
        $record        = self::where('id', $tickerRecord->id)->first();

        if (!$record) {
            return null;
        }

        $data = json_encode($record->data);
        Cache::add($cacheKey, $data);

        return new ParsedFinancialRecords(json_decode($existing));
    }

    public static function run(string|Ticker $ticker): void {
        if (is_string($ticker)) {
            $ticker = Ticker::getByTicker($ticker);
        }

        $data = FinancialModellingPrepApi::fetchAllData($ticker->ticker, ReportPeriodsEnum::FY);
        self::storeRecords($ticker->id, $data);
    }

    public function stock(): BelongsTo {
        return $this->belongsTo(Ticker::class, 'id', 'id');
    }

    public static function storeRecords(string $tickerId, object $data): void {
        self::where('id', $tickerId)->delete();
        $object       = new self();
        $object->id   = $tickerId;
        $object->data = $data;
        $object->save();

        $ticker                 = Ticker::getById($tickerId);

        if (!$ticker) {
            return;
        }

        $ticker->last_api_fetch = Carbon::now();
        $ticker->save();
        Cache::forget(self::cacheKey($ticker->ticker));
    }
}
