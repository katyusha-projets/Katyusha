<script setup lang="ts">
import { defineProps } from 'vue'
import { IProduct } from '~/interfaces/ProductInterfaces'

interface Props {
  products: Array<IProduct>
  title?: string
  slider?: boolean
}

const props = defineProps<Props>()
const sliderWidth = 220
</script>

<template>
  <section>
    <h2 v-if="title">{{ title }}</h2>
    <template v-if="slider">
      <van-swipe :width="sliderWidth">
        <van-swipe-item v-for="product in products" :key="product.id">
          <ProductCard :product="product" />
        </van-swipe-item>
        <template #indicator="{ active, total }"></template>
      </van-swipe>
    </template>
    <template v-else>
      <div class="product-grid">
        <ProductCard v-for="product in products" :key="product.id" :product="product" />
      </div>
    </template>
  </section>
</template>

<style lang="scss">
.product-grid {
  display:flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding: 0 .25rem;
}
</style>
