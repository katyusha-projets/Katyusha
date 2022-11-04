<script lang="ts" setup async>
import {useProfile} from '~/composables/useProfile'
const router = useRoute()
const { username } = router.params
const {user, loadUser} = useProfile()
await loadUser(`${username}`)
</script>

<template>
  <main>
    <div class="main main_channel js-main">
      <div class="main__container">
        <div class="main__item" :style="`background-image: url('${user.banner}')`"><div class="main__details"><div class="main__live live live_big">Live</div><div class="main__title h4">Renegades vs Chiefs - ESL Pro League Season 16</div><div class="main__parameters"><div class="main__parameter"><div class="main__icon"><img class="main__pic" src="img/league-of-legends.png" alt=""></div><div class="main__text">League of Legends®</div></div><div class="main__parameter">🇺🇸 English</div></div><a class="main__btn btn btn_purple" href="video-live.html" tabindex="0">Watch Now</a></div></div>
      </div>
    </div>
    <div class="page__center page__center_pt0">
      <div class="author author_big">
        <div class="author__container">
          <div class="author__details">
            <div class="ava ava_online">
              <img class="ava__pic" :src="user.avatar" alt="">
            </div>
            <div class="author__wrap">
              <div class="author__man h2 confirm">{{user.username}}</div>
              <div class="author__parameters">
                <div class="author__parameter h6">536K followers</div>
                <div class="author__parameter h6">120 videos</div>
              </div>
            </div>
          </div>
          <div class="author__btns">
            <button class="author__btn btn btn_purple">Follow</button>
            <button class="author__btn btn btn_asphalt btn_square">
              <svg class="icon icon-profile-check">
                <use xlink:href="img/sprite.svg#icon-profile-check">
                </use>
              </svg>
            </button>
          </div>
        </div>
      </div>
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
        <PortfoliosListing :portfolios="user.portfolios"/>
      </div>
    </div>
  </main>
</template>