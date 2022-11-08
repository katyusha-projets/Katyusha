<script setup lang="ts">
import { defineProps } from 'vue'
import { ICategory } from '~/interfaces/ProductInterfaces'
interface Props {
  categories: Array<ICategory>
}

const props = defineProps<Props>()
</script>

<template>
  <section>
    <h2 class="text-center">Categories</h2>
    <div class="cat-grid flex flex-wrap justify-between">
      <div v-for="category in categories" :key="category.id" class="cat">
        <div class="image" :style="`background-image: url('${category.image}')`"></div>
        <h3 class="name"><span>{{ category.name }}</span></h3>
      </div>
    </div>
    <slot name="after-categories" />
    <header id="shop-nav">
      <nav class="flex justify-start">
        <div v-for="(category, i) in categories" :key="category.id" :class="`${i === 1 ? 'current' : ''}`" class="flex flex-start cat"><span class="emoji mr-2">{{ category.emoji }}</span><span class="name">{{ category.name }}</span></div>
      </nav>
    </header>
  </section>
</template>

<style lang="scss" scoped>
#shop-nav {
  position: fixed;
  left: 0;
  right: 0;
  top: 0;
  z-index: 100;
  backdrop-filter: blur(4px);
  background: rgba(255,255,255,0.97);
}

.cat-grid {

  .cat {
    margin-bottom: 2rem;
    flex-basis: 33.3333%;

    .image {
      $size:80px;
      height:$size;
      width:$size;
      border-radius: $size;
      background-position: center;
      background-size: cover;
      margin: 0 auto 1rem;
      position: relative;

      &:before {
        $sizeAdjust: 6px;
        content:"";
        width:$size + $sizeAdjust;
        height:$size + $sizeAdjust;
        border-radius: $size;
        position: absolute;
        top: -($sizeAdjust / 2);
        left: -($sizeAdjust / 2);
        border: 1px solid #bb9df6;
      }
    }

    .emoji {
      $size:80px;
      margin: 0 auto .5rem;
      background-color: #e3eafd;
      line-height:$size;
      text-align: center;
      height:$size;
      width:$size;
      border-radius: $size;

      span {
        font-size: 38px;
      }
    }

    .name {
      text-align: center;
    }

    &:nth-child(2n) .emoji { background-color: #e2fbee; }
    &:nth-child(3n) .emoji { background-color: #fce0d3; }
    &:nth-child(4n) .emoji { background-color: #fff2d2; }
  }
}

nav {
  $height:42px;
  padding: 0.6rem 0;
  position: relative;
  top: -2px;

  .cat {
    text-overflow: ellipsis;
    white-space: nowrap;
    line-height: $height;
    height: $height;
    border-radius: 100px;
    padding: 0 1rem;

    .emoji {
      font-size: 21px;
    }

    &.current {
      background: #f2ecff;
    }
  }
}
</style>
