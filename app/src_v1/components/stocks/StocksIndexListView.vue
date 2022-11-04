<script setup lang="ts">
import { StockIndexType } from '~/types/StockTypes'

interface StockEntityProps {
  indexes: Array<StockIndexType>
}

const props = defineProps<StockEntityProps>()
</script>

<template>
  <div>
    <div class="card">
      <div class="card__head">
        <div class="title-green card__title">Stock Indexes</div>
      </div>
      <div class="activity">
        <div class="activity__table">
          <div class="activity__row">
            <div class="activity__col">Index name</div>
            <div class="activity__col">Stocks</div>
            <div class="activity__col">Market Cap.</div>
            <div class="activity__col">Change</div>
            <div class="activity__col">Performance</div>
          </div>
          <router-link v-for="item in indexes" :key="item.id" class="activity__row block" :to="`/stocks/collections/${item.namespace}`">
            <div class="activity__col"> <div class="activity__label">Name</div>{{ item.name }}</div>
            <div class="activity__col"> <div class="activity__label">Stocks</div> <div class="activity__item"> <div class="activity__counter" style="background-color: #B5E4CA;">8</div> <div class="balance positive"> <svg class="icon icon-arrow-top"> <use xlink:href="#icon-arrow-top"></use> </svg>37.8% </div> </div> </div>
            <div class="activity__col"> <div class="activity__label">Market Cap.</div> <div class="activity__item"> <div class="activity__counter" style="background-color: #CABDFF;">24k</div> <div class="balance positive"> <svg class="icon icon-arrow-top"> <use xlink:href="#icon-arrow-top"></use> </svg>24.3% </div> </div> </div>
            <div class="activity__col"> <div class="activity__label">Change</div> <div class="activity__item"> <div class="activity__counter" style="background-color: #B1E5FC;">48</div> <div class="balance negative"> <svg class="icon icon-arrow-bottom"> <use xlink:href="#icon-arrow-bottom"></use> </svg>17.8% </div> </div> </div>
            <div class="activity__col"> <div class="activity__label">Performance</div> <div class="activity__item"> <div class="activity__counter" style="background-color: #FFD88D;">16</div> <div class="balance negative"> <svg class="icon icon-arrow-bottom"> <use xlink:href="#icon-arrow-bottom"></use> </svg>56% </div> </div> </div>
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>
