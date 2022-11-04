<script type="ts" setup>
import { useShopStore } from '~/store/shop'
const shopStore = useShopStore()
</script>

<template>
  <header class="py-4">
    <section class="flex justify-between">
      <div class="help"><i class="fa-light fa-comments-question-check"></i></div>
      <div class="logo"><img :src="shopStore.currentShop.logo" /></div>
      <div class="hamburger"><i class="fa-light fa-bars"></i></div>
    </section>
  </header>
</template>

<style lang="scss" scoped>

.help {

  i {
    font-size: 21px;
  }
}

.hamburger {

  i {
    font-size: 21px;
  }
}

.logo {

  img {
    display: block;
    height: 28px;
  }
}
</style>
