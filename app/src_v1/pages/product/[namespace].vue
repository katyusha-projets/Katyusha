<script setup lang="ts">
import { useProductService } from '~/composables/useProductService'
const router = useRoute()
const productService = useProductService()
const { namespace } = router.params
const { product, get } = productService
await get(namespace)

</script>

<template>
  <div>
    <ProductDetails :product="product" />
  </div>
</template>
