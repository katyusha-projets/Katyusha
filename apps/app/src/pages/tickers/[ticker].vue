<route lang="yaml">
meta:
  layout: app-stocks
</route>

<script setup lang="ts">
import StockEntity from "~/apps/stocks/interfaces/StockEntity"
import StockIndexService from '~/apps/stocks/services/StockIndexService'
import StocksService from '~/apps/stocks/services/StocksService'
import { StockIndexType, StockType } from "~/apps/stocks/interfaces/StockInterfaces"
import Chart from '~/core/utils/Chart'
const router = useRoute()
const { ticker } = router.params
const service = new StocksService()
import NumberUtils from '~/core/utils/NumberUtils'

const data: StockType = await service.get(`${ticker}`)
const collection = new StockEntity(data)
const stockService: StocksService = new StocksService()
const stockIndexService: StockIndexService = new StockIndexService()
const profileIndexes: Array<StockIndexType> = await stockIndexService.getForCurrentUser()


let chartClose
try {
  chartClose = collection.getStockPrice('close')
} catch (e) {}

const charts = {
  close: chartClose
}

onMounted(() => {
  if(charts.close) {
  const historicalChart = new Chart('chart-historical-price', 'area')
    .addSeries('Price', charts.close.data)
    .setXAxis('categories', charts.close.dates)
  historicalChart.render()
  }
})

const balanceSheet = collection.getRecentBalanceSheet()

try {
  const { close } = collection.getRecentStockPrice()
} catch(e) {
  const close = null
}

const { market_cap } = data
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
  <div>
    <header>
      <div><img class="rounded-full" :src="`/logos/tickers/${data.logo}`"/></div>
      <div>
        <h2>{{ data.name }}</h2>
        <p>{{ data.description }}</p>
      </div>
    </header>
    <div id="chart-historical-price"></div>
  </div>
</template>
