<script type="ts" setup>
</script>

<template>
  <header>
      <van-search class="flex-grow" v-model="value" input-align="center" placeholder="Placeholder" />
  </header>
</template>

<style lang="scss" scoped>

header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
}

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
  position: relative;

  img {
    display: block;
    height: 28px;
  }
}
</style>
