<script lang="ts" setup>
import ProductService from '~/app/services/ProductService'
import { ProductType } from '~/types'

const service: ProductService = new ProductService()
const term = ref<string>('')
const products = ref<Array<ProductType>>([])

watch( term, async () => {
  products.value = await service.search(term.value)
})
</script>

<template>
  <div>
    <van-search v-model="term" placeholder="Enter term" />
    <div class="px-4">
      <ProductCardGrid :horizontal="true" :products="products" />
    </div>
  </div>
</template>
