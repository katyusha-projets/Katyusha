<script setup lang="ts">
import StockEntity from '~/app/entities/StockEntity'
import StockIndexService from '~/apps/stocks/services/StockIndexService'
import StocksService from '~/apps/stocks/services/StocksService'
import { StockIndexType, StockType } from '~/types/StockTypes'
import Chart from '~/core/utils/Chart'
const router = useRoute()
const { ticker } = router.params
const service = new StocksService()
import NumberUtils from '~/core/utils/NumberUtils'

const data: StockType = await service.get(`${ticker}`)
const collection = new StockEntity(data)

const charts = {
  close: collection.getStockPrice('close')
}

const stockService: StocksService = new StocksService()
const stockIndexService: StockIndexService = new StockIndexService()
const profileIndexes: Array<StockIndexType> = await stockIndexService.getForCurrentUser()

onMounted(() => {
  const historicalChart = new Chart('chart-historical-price', 'area')
    .addSeries('Price', charts.close.data)
    .setXAxis('categories', charts.close.dates)
  historicalChart.render()
})

const balanceSheet = collection.getRecentBalanceSheet()

const { market_cap } = data
const { close } = collection.getRecentStockPrice()
const { totalAssets } = collection.getRecentBalanceSheet()
const { revenue, grossProfit } = collection.getRecentIncomeStatement()

const indexesIsPartOf = ref<Array<string>>([])
data.indexes.forEach((index: StockIndexType) => {
  indexesIsPartOf.value.push(index.id)
})

watch(indexesIsPartOf, () => {
  stockService.setIndexes(data.id, indexesIsPartOf.value)
})
</script>

<template>
  <div class="dash">
    <div class="page__inner">
      <div class="page__container">
        <div class="page__row">
          <div class="card">
            <div class="card__head">
              <div class="title-blue card__title">{{ data.name }}</div>
              <n-checkbox-group v-model:value="indexesIsPartOf">
                <n-space item-style="display: flex;">
                  <n-checkbox v-for="index in profileIndexes" :key="index.id" :value="index.id" :label="index.name" />
                </n-space>
              </n-checkbox-group>
            </div>
            <div class="media">
              <div class="media__image mr-4">
                <img class="rounded-full" :src="`/logos/tickers/${data.logo}`" />
              </div>
              <div class="media__content">{{ data.description }}</div>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="income">
            <div class="income__list">
              <div class="income__item"><div class="income__line"><div class="income__details"><div class="income__label"> Market Cap <div class="tooltip tooltipstered"></div></div><div class="income__counter">{{ NumberUtils.usd(market_cap) }}</div><div class="income__indicator"><div class="balance negative"><svg class="icon icon-arrow-top"><use xlink:href="#icon-arrow-top"></use></svg>17.8% </div><span>this week</span></div></div></div></div>
              <div class="income__item"><div class="income__line"><div class="income__details"><div class="income__label"> Assets <div class="tooltip tooltipstered"></div></div><div class="income__counter">{{ NumberUtils.usd(totalAssets) }}</div><div class="income__indicator"><div class="balance negative"><svg class="icon icon-arrow-top"><use xlink:href="#icon-arrow-top"></use></svg>17.8% </div><span>this week</span></div></div></div></div>
              <div class="income__item"><div class="income__line"><div class="income__details"><div class="income__label"> Revenue <div class="tooltip tooltipstered"></div></div><div class="income__counter">{{ NumberUtils.usd(revenue) }}</div><div class="income__indicator"><div class="balance negative"><svg class="icon icon-arrow-top"><use xlink:href="#icon-arrow-top"></use></svg>17.8% </div><span>this week</span></div></div></div></div>
            </div>
          </div>
        </div>

        <div class="card" style="height: 570px;">
          <div id="chart-historical-price"></div>
        </div>

        <div class="card">
          <div class="card__head">
            <div class="title-blue card__title">Financials</div>
          </div>
          <div class="payout">
            <div class="payout__wrapper">
              <div class="payout__table">
                <div class="payout__row">
                  <div class="payout__col">Month</div>
                  <div class="payout__col">Status</div>
                  <div class="payout__col">Buy-signal</div>
                  <div class="payout__col">Earnings</div>
                  <div class="payout__col">Assets</div>
                </div>
                <div class="payout__row">
                  <div class="payout__col">Oct 2021</div>
                  <div class="payout__col">
                    <div class="status-green-dark payout__status">Healthy</div>
                  </div>
                  <div class="payout__col">
                    <div class="status-blue payout__status">Hold</div>
                  </div>
                  <div class="payout__col"> $98,165.00 </div>
                  <div class="payout__col"> $128,899.00 </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <PageCard title="Indexes">
          <div class="countries">
            <div class="countries__list">
              <router-link v-for="item in data.indexes" :key="item.id" :to="`/profile/${item.profile.username}`" class="countries__item pointer-cursor">
                <div class="countries__flag">🇺🇸</div>
                <div class="countries__title">{{ item.name }}</div>
                <div class="countries__price">{{ NumberUtils.usd(item.market_cap) }}</div>
              </router-link>
            </div>
          </div>
        </PageCard>
      </div>
    </div>
  </div>
</template>
