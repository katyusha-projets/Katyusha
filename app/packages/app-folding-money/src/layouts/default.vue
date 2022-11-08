<script lang="ts" setup>
import config from "~/app/config";
import {useSessionStore} from "~/store/session";
import Bootstrap from '~/app/Bootstrap'
// import { useModalStore } from '~/store/modals'
// import { useOrderStore } from '~/store/order'
//
// const orderStore = useOrderStore()
// const modalStore = useModalStore()
//
onMounted(() => {
  Bootstrap.app()
})

const session = useSessionStore()

const isUserDropdownOpen = ref<boolean>(false)
const isActionsOpen = ref<boolean>(false)
const isNotificationsOpen = ref<boolean>(false)

const openUserDropdown = () => { isUserDropdownOpen.value = true }
const openActions = () => { isActionsOpen.value = true }
const openNotifications = () => { isNotificationsOpen.value = true }
</script>

<template>
  <div>
    <div class="page">
      <div class="sidebar">
        <div class="sidebar__top">
          <a class="sidebar__logo" href="/">
            <img class="sidebar__pic sidebar__pic_black" src="/static/logo.svg" alt="" />
            <img class="sidebar__pic sidebar__pic_white" src="img/logo-white.svg" alt="" />
          </a>
          <button class="sidebar__burger">
          </button>
          <button class="sidebar__close">
            <svg class="icon icon-close">
              <use xlink:href="img/sprite.svg#icon-close">
              </use>
            </svg>
          </button>
        </div>
        <div class="sidebar__wrapper">
          <div class="sidebar__inner">
            <div class="sidebar__group">
              <div class="sidebar__menu">
                <a v-for="i in config.layout.sidebar.links"  :href="i.location" :key="i.location" class="sidebar__item mb-2">
                  <div class="sidebar__icon">
                    <i :class="`fa fa-light fa-${i.icon}`">
                    </i>
                  </div>
                  <div class="sidebar__text">{{i.title}}</div>
                </a>
              </div>
            </div>
            <div class="sidebar__group">
              <div class="sidebar__caption caption-sm">Portfolios</div>
              <div class="sidebar__list">
                <a class="sidebar__item" :href="`/portfolio/${portfolio.id}`" v-for="portfolio in session.user?.portfolios" :key="portfolio.id">
                  <div class="sidebar__ava"><img class="sidebar__pic" :src="portfolio.image" alt="" /></div>
                  <div class="sidebar__text">{{portfolio.name}}</div>
                </a>
              </div>
            </div>

            <div class="sidebar__group">
              <div class="sidebar__caption caption-sm">Stocks watching</div>
              <div class="sidebar__list">
                <a class="sidebar__item" :href="`/${ticker.ticker}`" v-for="ticker in session.user?.tickers_watching" :key="ticker.id">
                  <div class="sidebar__ava"><img class="sidebar__pic" :src="ticker.logo" alt="" /></div>
                  <div class="sidebar__text">{{ticker.name}}</div>
                </a>
              </div>
            </div>

          </div>
          <div class="sidebar__banner">
            <div class="sidebar__bg" :style="`background-image: url('${config.layout.sidebar.banner.image}');`">
            </div>
            <div class="sidebar__details">
              <div class="sidebar__title h5">{{config.layout.sidebar.banner.title}}</div>
              <div class="sidebar__info caption-sm">{{config.layout.sidebar.banner.subtitle}}</div>
              <a :href="config.layout.sidebar.banner.button.link" class="sidebar__btn btn btn_purple btn_wide">{{config.layout.sidebar.banner.button.title}}</a>
            </div>
          </div>
        </div>
      </div>
      <div class="page__wrapper">
        <div class="header">
          <button class="header__burger">
          </button>
          <form class="header__search">
            <input class="header__input" type="text" placeholder="Search Everything" />
            <button class="header__btn-search">
              <i class="fa fa-light fa-magnifying-glass">
              </i>
            </button>
          </form>
          <div class="header__control">
            <div class="header__item header__item_add js-header-item">
              <button class="header__head js-header-head" @click="openActions">
                <i class="fa-light fa-square-plus"></i>
              </button>
              <div class="header__body js-header-body" v-if="isActionsOpen">
                <a class="header__line" href="upload-videos.html">
                  <div class="header__icon">
                    <svg class="icon icon-camera">
                      <use xlink:href="img/sprite.svg#icon-camera">
                      </use>
                    </svg>
                  </div>
                  <div class="header__text">New Video</div>
                  <div class="header__icon">
                    <svg class="icon icon-add">
                      <use xlink:href="img/sprite.svg#icon-add">
                      </use>
                    </svg>
                  </div>
                </a>
                <a class="header__line" href="#">
                  <div class="header__icon">
                    <svg class="icon icon-star">
                      <use xlink:href="img/sprite.svg#icon-star">
                      </use>
                    </svg>
                  </div>
                  <div class="header__text">Go live</div>
                  <div class="header__icon">
                    <svg class="icon icon-live">
                      <use xlink:href="img/sprite.svg#icon-live">
                      </use>
                    </svg>
                  </div>
                </a>
              </div>
            </div>
            <a class="header__item header__item_search" href="#">
              <svg class="icon icon-search">
                <use xlink:href="img/sprite.svg#icon-search">
                </use>
              </svg>
            </a>
            <div class="header__item header__item_notifications js-header-item">
              <button class="header__head js-header-head" @click="openNotifications">
                <i class="fa-light fa-bell"></i>
                <div class="header__counter">2</div>
              </button>
              <div class="header__body js-header-body" v-if="isNotificationsOpen">
                <div class="notifications">
                  <div class="notifications__info h6">Recent Notification</div>
                  <div class="notifications__list">
                    <a class="notifications__item" href="#">
                      <div class="notifications__ava">
                        <img class="notifications__pic" src="img/ava-1.png" alt="">
                        <div class="notifications__status bg-blue">
                          <img class="notifications__pic" src="img/chat.svg" alt="">
                        </div>
                      </div>
                      <div class="notifications__details">
                        <div class="notifications__line">
                          <div class="notifications__user">Sarah Saunders</div>
                          <div class="notifications__time">8h</div>
                        </div>
                        <div class="notifications__text">Commented on <span class="notifications__project">The Results Are Beautif</span>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="header__item header__item_profile">
<span @click="openUserDropdown" class="header__head" >
<img class="header__pic" :src="session.user?.avatar" alt="" />
</span>
            <div class="header__body" v-if="isUserDropdownOpen">
              <a class="header__link" v-for="i in config.layout.sidebar.links"  :href="i.location" :key="i.location" >
                <div class="header__img">
                  <i :class="`fa fa-light fa-${i.icon}`">
                  </i>
                </div>{{i.title}}</a>
            </div>
          </div>
        </div>
        <RouterView />
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
.header__body {
  opacity: 1;
  visibility: visible;
}

.sidebar__logo .sidebar__pic {
  width: 137px;
}

.header__item_add .header__head {
  border:none;
}

i {
  font-size: 20px;
}
</style>