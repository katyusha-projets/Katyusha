<script lang="ts" setup>
import {IPortfolio} from "~/app/interfaces/PortfolioInterfaces";
import {ITicker} from "~/app/interfaces/TickerInterfaces";
const props = defineProps<{tickers: Array<ITicker>, title: string}>()
</script>


<template>
  <div class="trending__col">

    <div class="trending__title h6">{{title}}</div>
    <div class="trending__list">
      <a :href="`/${ticker.ticker}`" class="card mb-4" v-for="ticker in tickers" :key="ticker.id">
        <div class="card__inner">

          <div>
            <img :src="ticker.logo"/>
          </div>

          <div class="card__details">
            <div class="card__head">
              <div class="live">Live</div>
              <div class="card__category">Shooter</div>
            </div>
            <div class="card__title h6">{{ticker.ticker}} | {{ticker.name}}</div>
            <div class="card__status">
              <div class="status blue">4.2K watching</div>
              <div class="status green">1 week ago</div>
            </div>
            <div class="card__user">
              <div class="card__ava"><img class="card__pic" src="img/ava-1.png" alt=""></div>
              <div class="card__desc">
                <div class="card__man confirm">Gabriel Erickson </div>
                <div class="card__game">Call of Duty</div>
              </div>
            </div>
          </div>
        </div>

      </a>

    </div>
    <div class="trending__btns"><button class="trending__btn btn btn_gray">Load More</button></div>
  </div>
</template>