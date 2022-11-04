<script setup lang="ts">
import { useStockIndex } from '~/composables/stocks/useStockIndex'
import NumberUtils from '~/core/utils/NumberUtils'
import StockCollection from '~/app/collections/StockCollection'
import { StockType } from '~/types/StockTypes'

interface StockEntityProps {
  namespace: string
  hideProfile: boolean
}

const props = defineProps<StockEntityProps>()
const { index, followers, followerIds, isUserFollowing, loadIndex, follow, unfollow } = useStockIndex()

await loadIndex(props.namespace)
// @ts-ignore
const stockCollection: StockCollection = new StockCollection(index.value.tickers)
const stocksByIndustry = stockCollection.groupedByIndustry()

const series = []
Object.keys(stocksByIndustry).forEach((key: string) => {
  const treeMapData: Array<{x: string, y: number}> = []

  stocksByIndustry[key].forEach((stock: StockType) => {
    treeMapData.push({ x: stock.name, y: stock.market_cap })
  })

  series.push({ name: key, data: treeMapData })
})

const chartOptions = {
  legend: {
    show: false
  },
  chart: {
    height: 350,
    type: 'treemap'
  },
  title: {
    text: 'Multi-dimensional Treemap',
    align: 'center'
  }
}
</script>

<template>
  <div class="stock-index">
    <div v-if="!hideProfile" class="flex justify-start">
      <router-link :to="`/profile/${index.profile.username}`" class="avatar" :style="`background-image: url('${index.profile.avatar}')`"></router-link>
      <div>
        <h2>{{ index.name }}</h2>
        <h4><router-link :to="`/profile/${index.profile.username}`">@{{ index.profile.username }}</router-link></h4>
      </div>
    </div>

    <div class="card">
      <div class="flex index-actions justify-end mb-8">
        <Button v-if="isUserFollowing" color="danger" class="w-full" raised bold @click="unfollow">Stop following</Button>
        <Button v-else color="primary" class="w-full" raised bold @click="follow">Follow index</Button>
      </div>

      <div class="income">
        <div class="income__list">
          <div class="income__item"> <div class="income__line"> <div class="income__details"> <div class="income__label"> Market Cap. <div class="tooltip tooltipstered"> <svg class="icon icon-info"> <use xlink:href="#icon-info"></use> </svg> </div> </div> <div class="income__counter">{{ NumberUtils.usd(index.market_cap) }}</div> <div class="income__indicator"> <div class="balance positive"> <svg class="icon icon-arrow-top"> <use xlink:href="#icon-arrow-top"></use> </svg>37.8% </div><span>this week</span> </div> </div> </div> </div>
          <div class="income__item"> <div class="income__line"> <div class="income__details"> <div class="income__label"> Revenue <div class="tooltip tooltipstered"> <svg class="icon icon-info"> <use xlink:href="#icon-info"></use> </svg> </div> </div> <div class="income__counter">{{ NumberUtils.usd(index.totals.totalIncomeStatement?.revenue) }}</div> <div class="income__indicator"> <div class="balance negative"> <svg class="icon icon-arrow-top"> <use xlink:href="#icon-arrow-top"></use> </svg>17.8% </div><span>this week</span> </div> </div> </div> </div>
          <div class="income__item"> <div class="income__line"> <div class="income__details"> <div class="income__label"> Assets <div class="tooltip tooltipstered"> <svg class="icon icon-info"> <use xlink:href="#icon-info"></use> </svg> </div> </div> <div class="income__counter">{{ NumberUtils.usd(index.totals.totalBalanceSheet?.totalAssets) }}</div> <div class="income__indicator"> <div class="balance positive"> <svg class="icon icon-arrow-top"> <use xlink:href="#icon-arrow-top"></use> </svg>24.3% </div><span>this week</span> </div> </div> </div> </div>
        </div>
      </div>
    </div>

    <div class="card"><apexchart type="treemap" height="350" :options="chartOptions" :series="series"></apexchart></div>

    <div class="page__row">
      <div class="page__col">
        <PageCard title="Stocks">
          <List url-path="stocks" url-item-key="ticker" title-key="name" value-key="market_cap" image-key="logo" :data="index.tickers" />
        </PageCard>
      </div>

      <div class="page__col">
        <PageCard title="Industry breakdown">
          <apexchart width="380" type="donut" :labels="['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']" :options="{chart: {type: 'donut'}}" :series="[44, 55, 41, 17, 15]"></apexchart>
        </PageCard>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.index-actions {
  margin-bottom: 2rem;

  button {
    max-width: 180px;
  }
}

.avatar {
  width:150px;
  height: 150px;
}

.page__col {
  width:50% !important;
  flex-shrink: unset !important;
}

.stock-index {

  .card {
    margin-top: 0 !important;
  }
}
</style>
