<script lang="ts" setup>
import ProductService from '~/app/services/ProductService'
import { ProductType } from '~/types'

const service: ProductService = new ProductService()
const term = ref<string>('')
const products = ref<Array<ProductType>>([])

watch( term, async () => {
  products.value = !term.value ? [] : await service.search(term.value)
})
</script>

<template>
  <div>
    <div class="px-4 md:px-8 2xl:px-16">
      <van-search v-model="term" placeholder="Enter term" />
    </div>
    <div class="px-4">
      <ProductCardContainer :products="products" />
    </div>
  </div>
</template>
