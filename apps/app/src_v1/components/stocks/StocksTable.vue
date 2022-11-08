<script async setup lang="ts">
import { StockType } from '~/types/StockTypes'
import NumberUtils from '~/core/utils/NumberUtils'
import { useModalStore } from '~/store/modals'

interface StocksTableProps {
  tickers: Array<StockType>
}

const props = defineProps<StocksTableProps>()
const modalStore = useModalStore()

const columns: Array<{title: string, key: string, callback?: (value: any) => {}}> = [
  { title: 'Ticker', key: 'ticker' },
  { title: 'Name', key: 'name' },
  { title: 'Market cap', key: 'market_cap', callback: (value: any) => NumberUtils.usd(value) },
  { title: 'Industry', key: 'industry' },
  { title: 'Sector', key: 'sector' }
]

const open = async(ticker: string): Promise<void> => {
  await modalStore.openStock(ticker)
}
</script>

<template>
  <div class="dash">
    <div class="card">
      <div class="card__head">
        <div class="title-blue card__title">Payout history</div>
      </div>
      <div class="payout">
        <div class="payout__wrapper">
          <div class="payout__table">
            <div class="payout__row">
              <div v-for="col in columns" :key="`head-${col.key}`" class="payout__col">{{ col.title }}</div>
            </div>
            <div v-for="ticker in tickers" :key="ticker.id" class="payout__row" @click="() => open(ticker.ticker)">
              <div v-for="col in columns" :key="`head-${col.key}`" class="payout__col">{{ col.callback ? col.callback(ticker[col.key]) : ticker[col.key] }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.payout__row {
 cursor: pointer;

  &:hover {
    background-color: #b2e4fc;
  }
}
</style>
