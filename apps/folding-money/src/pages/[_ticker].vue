<script lang="ts" setup async>
import {useProfile} from '~/composables/useProfile'
import {useTicker} from "~/composables/useTicker";
import {useSessionStore} from "~/store/session";
import {IPortfolio} from "~/app/interfaces/PortfolioInterfaces";
import _ from "lodash";
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
  <main class="page__center">
    <div class="player__head">
      <div class="player__box">
        <div class="player__ava "><img class="player__photo rounded-full" :src="ticker.logo" alt=""></div>
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


    <div class="details details_big">
      <div class="details__container">
        <div class="details__title h6">Real-time Users Active 💡</div>
        <div class="details__row">
          <div class="details__col">
            <div class="details__top">
              <div class="details__number h1">687</div><a class="details__line" href="#">
              <div class="details__preview"><img class="details__pic" src="img/details-pic.png" alt=""></div>
              <div class="details__info caption-sm">Views per minute</div>
            </a>
            </div>
            <div class="details__bottom">
              <div class="details__statistics">
                <div class="details__chart details__chart_activity">
                  <div id="chart-active-users"></div>
                </div>
                <div class="details__status">
                  <div class="details__icon bg-blue"><svg class="icon icon-arrow-down-fat">
                    <use xlink:href="img/sprite.svg#icon-arrow-down-fat"></use>
                  </svg></div>
                  <div class="details__percent caption-sm color-blue">6%</div>
                </div>
              </div>
              <div class="details__info caption-sm color-gray">Update your payout method in Settings</div>
            </div>
          </div>
          <div class="details__col">
            <div class="details__box">
              <div class="details__chart details__chart_counter">
                <div id="chart-users-counter"></div>
              </div><button class="details__remove"><svg class="icon icon-remove">
              <use xlink:href="img/sprite.svg#icon-remove"></use>
            </svg></button>
            </div>
          </div>
        </div>
        <div class="details__list">
          <div class="details__item">
            <div class="details__head">
              <div class="details__preview bg-purple"><img class="details__pic" src="img/folder.svg" alt=""></div>
              <div class="details__text caption-sm">Users</div>
            </div>
            <div class="details__counter h3">1.5m</div>
            <div class="details__indicator">
              <div class="details__progress bg-purple" style="width: 55%;"></div>
            </div>
          </div>
          <div class="details__item">
            <div class="details__head">
              <div class="details__preview bg-pink"><img class="details__pic" src="img/activity.svg" alt=""></div>
              <div class="details__text caption-sm">Clicks</div>
            </div>
            <div class="details__counter h3">1m</div>
            <div class="details__indicator">
              <div class="details__progress bg-pink" style="width: 52%;"></div>
            </div>
          </div>
          <div class="details__item">
            <div class="details__head">
              <div class="details__preview bg-blue"><img class="details__pic" src="img/bag.svg" alt=""></div>
              <div class="details__text caption-sm">Subscribers</div>
            </div>
            <div class="details__counter h3">529k</div>
            <div class="details__indicator">
              <div class="details__progress bg-blue" style="width: 55%;"></div>
            </div>
          </div>
          <div class="details__item">
            <div class="details__head">
              <div class="details__preview bg-orange"><img class="details__pic" src="img/chat.svg" alt=""></div>
              <div class="details__text caption-sm">Earning</div>
            </div>
            <div class="details__counter h3">478$</div>
            <div class="details__indicator">
              <div class="details__progress bg-orange" style="width: 68%;"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="trending">
    <div class="trending__row">
      <div class="trending__col">




        <div class="trending__title h6">Top Trending Now</div>
        <div class="trending__list">





          <div class="card">
            <div class="card__inner">
              <div class="card__bg" style="background-image: url(img/card-pic-2.png);">
                <div class="card__number">6</div>
              </div>
              <div class="card__details">
                <div class="card__head">
                  <div class="live">Live</div>
                  <div class="card__category">Shooter</div>
                </div>
                <div class="card__title h6">Spectating the Pros - Fly Santorin, PowerofEvil - New Caps vs PoE</div>
                <div class="card__status">
                  <div class="status blue">4.2K watching</div>
                  <div class="status green">1 week ago</div>
                </div>
                <div class="card__user">
                  <div class="card__ava"><img class="card__pic" src="img/ava-2.png" alt=""></div>
                  <div class="card__desc">
                    <div class="card__man confirm">Gabriel Erickson </div>
                    <div class="card__game">Call of Duty</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card__actions"><button class="card__action"><svg class="icon icon-reply">
              <use xlink:href="img/sprite.svg#icon-reply"></use>
            </svg></button><button class="card__action"><svg class="icon icon-play-square">
              <use xlink:href="img/sprite.svg#icon-play-square"></use>
            </svg></button><button class="card__action"><svg class="icon icon-heart">
              <use xlink:href="img/sprite.svg#icon-heart"></use>
            </svg></button></div>
          </div>
        </div>
        <div class="trending__btns"><button class="trending__btn btn btn_gray">Load More</button></div>
      </div>
      <div class="trending__col">

        <div class="trending__item trending__item_streamers">
          <div class="trending__title h6">Trending Streamers</div>
          <div class="trending__group js-slider-streamers js-slider-resize"><div class="trending__slide" style="" aria-hidden="true" tabindex="-1"><a class="trending__user" href="#" tabindex="-1"><div class="trending__ava"><img class="trending__pic" src="img/ava-5.png" alt=""></div><div class="trending__desc"><div class="trending__man confirm">Tran Mau Tri Tam </div><div class="trending__game">Call of Duty</div><div class="status orange">2.8K viewers</div></div></a></div></div>
          <button class="trending__btn btn btn_gray btn_wide">Discover More</button>
        </div>
        <div class="trending__item">
          <div class="trending__title h6">Trending Games</div>
          <div class="trending__slider js-slider-games js-slider-resize"><div class="trending__slide" style="" aria-hidden="true" tabindex="-1"><a class="trending__box" href="#" tabindex="-1"><div class="trending__preview"><img class="trending__pic" src="img/game-pic-4.png" alt=""></div><div class="trending__details"><div class="trending__game">League of Legends® </div><div class="trending__text">League of Legends is a team-based game with over 140 champions. </div></div></a></div></div>

          <button class="trending__btn btn btn_gray btn_wide">Discover More</button>
        </div>
      </div>
    </div>
    </div>

  </main>
</template>