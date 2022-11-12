<script lang="ts" setup async>
import {useProfile} from '~/composables/useProfile'
import {useTicker} from "~/composables/useTicker";
import {useSessionStore} from "~/store/session";
import {IPortfolio} from "~/app/interfaces/PortfolioInterfaces";
import _ from "lodash";
import TickerFinancialTable from "~/components/modules/ticker/TickerFinancialTable.vue";
const router = useRoute()
const { _ticker } = router.params
const {ticker, loadTicker, follow, unfollow, isCurrentUserFollowing, setStockUserPortfolios} = useTicker()
await loadTicker(`${_ticker}`)
const session = useSessionStore()


const tickerUserPortfolios: Array<string> = []
onMounted(() => {
  session.user?.portfolios.forEach((item: IPortfolio) => {
    if(_.find(item.tickers, {id: ticker.value?.id})) tickerUserPortfolios.push(item.id)
  })
})

watch(tickerUserPortfolios, () => {
  setStockUserPortfolios(tickerUserPortfolios)
})

</script>

<template>
  <main>
    <div class="player__head">
      <div class="player__box">
        <div class="player__ava "><img class="player__photo rounded-full" style="border-radius: 100px" :src="ticker.logo" alt=""></div>
        <div class="player__desc">
          <div class="player__stat">
            <div class="player__stage h5">{{ticker.ticker}}</div>
          </div>
          <div class="player__title h2">{{ticker.name}}</div>
          <div class="player__note">{{ticker.description}}</div>

          <n-checkbox-group v-model:value="tickerUserPortfolios">
            <n-space item-style="display: flex;">
              <n-checkbox v-for="index in session.user?.portfolios" :key="index.id" :value="index.id" :label="index.name" />
            </n-space>
          </n-checkbox-group>
        </div>
      </div>
      <div class="player__options">
        <button class="player__option btn btn_purple-light" @click="follow" v-if="!isCurrentUserFollowing"><i class="fa-light fa-eye mr-2"></i>Watch this stock</button>
        <button class="player__option btn btn_purple-light" @click="unfollow" v-else><i class="fa-light fa-eye-slash mr-2"></i>Stop watching</button>
      </div>
    </div>


    <MixedChart/>
    <TreeMap/>
    <TickerFinancialTable :ticker="ticker"/>
  </main>
</template>

<style lang="scss">
.details__chart_counter {
  height:350px;

  .details__box {
    background-color: #f5f5f5;
  }
}
</style>
