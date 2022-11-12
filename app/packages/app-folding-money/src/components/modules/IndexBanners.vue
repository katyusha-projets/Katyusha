<script setup lang="ts">
const banners: Array<any> = [
  { title: 'Blowout sale!', image: 'https://i.imgur.com/PH5GCrj.jpg', subtitle: 'Look great this winter!', link: 'xxxxx' },
  { title: 'Incredible cars', image: 'https://i.imgur.com/ePRhHbp.jpg', subtitle: '2 year warranty on all vehicles', link: 'xxxxx' },
  { title: 'Your dream computer', image: 'https://i.imgur.com/blr9M0H.jpg', subtitle: 'New and used computers', link: 'xxxxx' }
]
</script>

<template>
  <section class="relative full-width">
    <van-swipe :autoplay="4000" :loop="true">
      <van-swipe-item v-for="banner in banners" :key="banner.title">
        <div class="banner" :style="`background-image: url('${banner.image}')`">
          <div class="headings">
            <h2>{{ banner.title }}</h2>
            <h3>{{ banner.subtitle }}</h3>
          </div>
        </div>
      </van-swipe-item>
      <template #indicator="{ active, total }">
        <div class="custom-indicator">{{ active + 1 }}/{{ total }}</div>
      </template>
    </van-swipe>
    <WhiteWaveSeparator />
  </section>
</template>

<style lang="scss" scoped>
.custom-indicator {
  position: absolute;
  right: 5px;
  top: 5px;
  padding: 2px 5px;
  font-size: 12px;
  background: rgba(0, 0, 0, 0.1);
  color:#FFF;
}

.banner {
  $height:280px;
  border-radius:0;
  height:$height;
  background-position: center;
  background-size: cover;
  position: relative;

  .headings {
    position: absolute;
    text-align: center;
    left: 1rem;
    top: 3.5rem;
    right: 1rem;
    padding: 1rem;
    width: calc(100% - 2rem);
    color: #FFF;
  }

  h2 {
    font-size: 2rem;
  }

  h3 {
    font-size: 1.2rem;
  }
}

</style>
