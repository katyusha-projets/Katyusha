<script setup lang="ts">
import { appHeaderLinks, appLogo, appLogoWhite, appName } from '~/app/config/appConfig'

const isAboveHero = true
const logo = isAboveHero ? appLogoWhite : appLogo
</script>

<template>
  <header id="app-header">
    <section class="flex justify-between px-4">
      <div class="logo"><router-link to="/"><img :src="logo" :alt="appName" /></router-link></div>
      <nav class="flex justify-between">
        <router-link v-for="link in appHeaderLinks()" :key="link.title" :to="link.location">
          <span>{{ link.title }}</span>
        </router-link>
      </nav>

      <aside>
      </aside>
    </section>
  </header>
</template>

<style lang="scss" >
.logo {

  img {
    height:var(--logo-height);
    display:block;
  }
}

header#app-header {
  background: #0c021deb;
  height: var(--header-height);
  position: fixed;
  top: 1rem;
  left: 1rem;
  right: 1rem;
  z-index: 100;
  -webkit-backdrop-filter: blur(2px);
  backdrop-filter: blur(4px);

  .logo, .search-component {
    position: absolute;
    top:50%;
    transform: translateY(-50%);
  }

  .search-component {
    height: var(--header-height);
    position: absolute;
    right: 0;
    background: #FFF;
    z-index: 10000;
    min-width: var(--header-search-width);

    input {
      height: var(--header-height);
      line-height: var(--header-height);
    }
  }

  aside {
    right:0;
  }
}
</style>
