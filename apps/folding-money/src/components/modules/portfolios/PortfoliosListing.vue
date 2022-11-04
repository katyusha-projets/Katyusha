<script lang="ts" setup>
import {IPortfolio} from "~/app/interfaces/PortfolioInterfaces";
const props = defineProps<{portfolios: Array<IPortfolio>}>()
</script>


<template>
  <div class="collection__list">

    <a class="card" :href="`/portfolio/${portfolio.id}`" v-for="portfolio in portfolios" :key="portfolio.id">
      <div class="card__preview"><img class="card__pic" :src="portfolio.image"></div>
      <div class="card__body">
        <div class="card__title h6">{{portfolio.name}}</div>
        <div class="card__user">

          <div class="card__ava" v-for="ticker in portfolio.tickers"><img class="card__pic" :src="ticker.logo" alt=""></div>
        </div>

      </div>
      <div class="card__foot">
        <div class="live">Live</div>
        <div class="status blue">4.2B market cap</div>
      </div>
    </a>



  </div>
</template>