<script lang="ts" setup>
const searchTerm = ref<string>('')
</script>

<template>
  <header class="py-4">
    <section class="flex justify-between">
      <div class="logo"><img src="/apps/stocks/logo.svg" /></div>
      <van-search v-model="searchTerm" class="flex-grow" placeholder="Search by ticker or name" />
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
    height: 51px;
    border-radius: 5px;
  }
}
</style>
