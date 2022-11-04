<?php


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use FoldingMoney\Api\FinancialModellingPrepApi;
use FoldingMoney\Domains\FinancialRecords\FinancialRecords;

Route::get('/dev', function () {
    dd(FinancialRecords::fetch('aapl'));
});
//Route::get('/dev', fn () => FinancialModellingPrepApi::apiCall(FinancialDataEnum::BALANCE_SHEET_STATEMENTS, 'aapl', []));


//Route::get('/dev', function () {
//    $got = [];
//
//    foreach (explode("\n", file_get_contents(__DIR__.'/all.txt')) as $line) {
//        if (!Str::contains($line, ['/AAPL'])) {
//            continue;
//        }
//
//        if (!Str::contains($line, ['/historical/'])) {
//            continue;
//        }
//
//
//        $line = str_replace('https://financialmodelingprep.com/api/v3/historical/', '', $line);
//        $boom = explode('/', $line);
//        $want = str_replace('"', '', $boom[0]);
//        dd($want);
//
//        $got[$want] = $want;
//    }
//
//
//    dd($got);
//
//    foreach ($got as $i) {
//        $enum = mb_strtoupper(str_replace('-', '_', $i));
//
//        echo "case ${enum};<br/>";
//    }
//});

//Route::get('/dev', function () {
//    $urls = ['https://financialmodelingprep.com/api/v3/rss_feed?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/earning_call_transcript/AAPL?quarter=3&year=2020&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/enterprise-values/AAPL?limit=40&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/income-statement-growth/AAPL?apikey=YOUR_API_KEY&limit=40', 'https://financialmodelingprep.com/api/v3/rating/AAPL?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/company/discounted-cash-flow/AAPL?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/institutional-ownership/institutional-holders/symbol-ownership-percent?date=2021-09-30&symbol=AAPL&page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/institutional-ownership/portfolio-holdings-summary?cik=0001067983&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/institutional-ownership/name?name=Berkshire%20Hathaway%20Inc&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/institutional-ownership/portfolio-date?cik=0001067983&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/institutional-ownership/institutional-holders/symbol-ownership?date=2021-09-30&symbol=AAPL&page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/institutional-ownership/portfolio-holdings?cik=0001067983&date=2021-09-30&page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/esg-environmental-social-governance-data?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/esg-environmental-social-governance-data-ratings?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/esg-environmental-social-governance-sector-benchmark?year=2022&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/crowdfunding-offerings-rss-feed?page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/crowdfunding-offerings/search?name=Enotap&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/crowdfunding-offerings?cik=0001916078&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/fundraising-rss-feed?page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/fundraising/search?name=marinalife&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/fundraising?cik=0001870523&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/price-target?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/price-target-summary?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/price-target-analyst-name?name=Tim%20Anderson&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/price-target-analyst-company?company=Barclays&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/upgrades-downgrades?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/upgrades-downgrades-rss-feed?page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/upgrades-downgrades-consensus?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/mutual-fund-holdings/portfolio-date?symbol=VTSAX&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/mutual-fund-holdings?symbol=VTSAX&date=2021-12-31&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/etf-holdings?symbol=VOO&date=2021-12-31&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/historical/employee_count?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/insider/ownership/acquisition_of_beneficial_ownership?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/ipo-calendar-prospectus?from=2021-11-10&to=2022-02-01&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/ipo-calendar-confirmed?from=2021-11-10&to=2022-02-01&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/historical-price-full/stock_dividend/AAPL?apikey=YOUR_API_KEY', '  https://financialmodelingprep.com/api/v3/economic_calendar?from=2021-09-05&to=2021-10-19&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/get-all-countries?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/profile/AAPL?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/key-executives/AAPL?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/market-capitalization/AAPL?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/company-outlook?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/stock_peers?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/company-core-information?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/fmp/articles?page=0&size=5&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/stock_news?tickers=AAPL,FB,GOOG,AMZN&page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/crypto_news?page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/general_news?page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/press-releases/AAPL?page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/stock_market/gainers?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/stock_market/losers?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/stock_market/actives?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/standard_industrial_classification?cik=0000320193&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/commitment_of_traders_report_analysis?from=2020-09-12&to=2021-01-01&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/historical/social-sentiment?symbol=AAPL&page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/analyst-estimates/AAPL?limit=30&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/mergers-acquisitions-rss-feed?page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/insider-trading-rss-feed?page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/fail_to_deliver?symbol=GE&page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/senate-disclosure?symbol=AAPL&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/market_risk_premium?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/economic?name=GDP&from=2019-10-10&to=2021-11-10&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/quote/AAPL?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/stock-price-change/AAPL?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/historical-price-full/AAPL?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/historical-price-full/ABI/2012-01-03?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/technical_indicator/daily/AAPL?period=10&type=ema&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/etf-holder/SPY?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v4/etf-info?symbol=SPY?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/institutional-holder/AAPL?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/etf-sector-weightings/SPY?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/etf-country-weightings/SPY?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/etf-stock-exposure/AAPL?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/cik_list?apikey=YOUR_API_KEY', 'wss://crypto.financialmodelingprep.com', 'https://financialmodelingprep.com/api/v3/stock/list?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/available-traded/list?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/quote/AAPL,FB,GOOG?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/sp500_constituent?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/historical/sp500_constituent?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/historical/dowjones_constituent?page=0&apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/available-indexes?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/quote/EDF.PA,KIN.BR,SCB.LS?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/quotes/tsx?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/historical-chart/1min/FNV.TO?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/historical-price-full/stock_dividend/FNV.TO?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/historical-chart/1min/AAPL?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/fx?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/historical-price-full/JPYUSD?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/historical-chart/1min/ZGUSD?apikey=YOUR_API_KEY', 'https://financialmodelingprep.com/api/v3/historical-price-full/ZGUSD?apikey=YOUR_API_KEY'];
//
//
//    foreach ($urls as $item) {
//        if (!Str::containsAll($item, ['AAPL'])) {
//            continue;
//        }
//
//        $boom  = explode('AAPL', $item);
//        $boom  = explode('/', $boom[0]);
//        $clean = [];
//
//        foreach ($boom as $boomItem) {
//            if ($boomItem) {
//                $clean[] = $boomItem;
//            }
//        }
//
//        $key     = end($clean);
//        $enumKey = mb_strtoupper($key);
//        dd($key);
//
//        echo $item;
//    }
//});
