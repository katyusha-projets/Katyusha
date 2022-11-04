<script setup lang="ts">
import { appLogo, appLogoWhite, appName, menuLinks } from '~/app/config/appConfig'

const isAboveHero = true
const logo = isAboveHero ? appLogoWhite : appLogo
</script>

<template>
  <div class="dash">
    <div class="sidebar">
      <button class="sidebar__close"><i class="fa-light fa-xmark-large"></i></button>
      <router-link class="sidebar__logo" to="/">
        <img class="some-icon" :src="appLogo" :alt="appName">
        <img class="some-icon-dark" :src="appLogoWhite" :alt="appName">
      </router-link>
      <div class="sidebar__menu">
        <router-link v-for="item in menuLinks" :key="item.title" class="sidebar__item" :href="item.location"><i :class="item.icon">{{ item.title }}</i></router-link>
      </div>
      <button class="sidebar__toggle">
        <svg class="icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg>
        <i class="fa-light fa-xmark-large"></i>
      </button>
      <div class="sidebar__foot">
        <button class="sidebar__help"><i class="mr-2 fa-light fa-message-question"></i>Help &amp; getting started <div class="sidebar__counter">8</div>         </button>
        <label class="theme js-theme">
          <input class="theme__input" type="checkbox">
          <span class="theme__inner">
            <span class="theme__box"><svg class="icon icon-sun">  <use xlink:href="#icon-sun">  </use></svg>Light</span>
            <span class="theme__box"><svg class="icon icon-moon">  <use xlink:href="#icon-moon">  </use></svg>Dark</span>
          </span>
        </label>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
#app {

  .sidebar__logo {
    width: unset;
    height: 30px;

    img {
      max-height: 100%;
      max-width: unset;
    }
  }
}
</style>
