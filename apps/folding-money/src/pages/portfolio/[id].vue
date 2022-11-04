<script lang="ts" setup async>
import {useProfile} from '~/composables/useProfile'
import {usePortfolio} from "~/composables/usePortfolio";
import FullStocksListModule from "~/components/modules/stocks/FullStocksListModule.vue";
const router = useRoute()
const { id } = router.params
const {portfolio,loadPortfolio } = usePortfolio()
await loadPortfolio(`${id}`)
</script>

<template>
  <main>
    <div class="author author_big">
      <div class="author__container">
        <div class="author__details">
          <div class="ava ava_online">
            <img class="ava__pic" :src="portfolio.image" alt="">
          </div>
          <div class="author__wrap">
            <div class="author__man h2 confirm">{{portfolio.name}}</div>
            <div class="card__user">
              <div class="card__ava"><img class="card__pic rounded-full" :src="portfolio.user.avatar" alt=""></div>
              <div class="card__desc">
                <div class="card__man confirm">{{portfolio.user.username}} </div>
                <div class="card__game">Call of Duty</div>
              </div>
            </div>
          </div>
        </div>
        <div class="author__btns">
          <button class="author__btn btn btn_purple">Message</button>
          <button class="author__btn btn btn_asphalt btn_square">
            <svg class="icon icon-profile-check">
              <use xlink:href="img/sprite.svg#icon-profile-check">
              </use>
            </svg>
          </button>
        </div>
      </div>
    </div>


    <div class="page__center page__center_pt0">
      <div class="catalog catalog_channel">
        <div class="catalog__nav">
          <a class="catalog__link active" href="#">Videos</a>
          <a class="catalog__link" href="#">About</a>
          <a class="catalog__link" href="#">Stories</a>
          <a class="catalog__link" href="#">Schedules </a>
        </div>
        <div class="catalog__sorting">
          <div class="field mobile-show">
            <div class="field__wrap">
              <select class="field__select purple">
                <option>All</option>
                <option>Stream Videos</option>
                <option>Videos</option>
              </select>
            </div>
          </div>
          <div class="catalog__tags mobile-hide">
            <a class="catalog__tag" href="#">All</a>
            <a class="catalog__tag" href="#">Stream Videos</a>
            <a class="catalog__tag" href="#">Videos</a>
          </div>
          <div class="field">
            <div class="field__wrap">
              <select class="field__select">
                <option>Popular Videos</option>
                <option>New</option>
                <option>Free</option>
              </select>
            </div>
          </div>
        </div>
      </div>

      <UserListModule/>
      <FullStocksListModule title="Stocks" :tickers="portfolio.tickers"/>

    </div>




  </main>
</template>

<style lang="scss" scoped>
.author_big {
  margin-top: 0;
}
</style>