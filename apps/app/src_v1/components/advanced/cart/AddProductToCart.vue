<script setup lang="ts">
import { LineItemDTO } from '~/app/DTOs/LineItemDTO'
import { useProductService } from '~/composables/useProductService'

interface ProductDetailsProps {
  namespace: string
}

const props = defineProps<ProductDetailsProps>()
const productService = useProductService()
const cart = useCart()
const { product, get } = productService
await get(props.namespace)
const { addItemToCart } = cart

const variationId = ref<string|null>(null)
const qty = ref<number>(1)
const lineItem: LineItemDTO = {
  product_id: product.value.id,
  variation_id: variationId.value,
  qty: qty.value
}

const addToCart = async(): Promise<void> => {
  await addItemToCart(lineItem)
}
</script>

<template>
  <Button color="primary" class="w-full" raised bold @click="addToCart">Add to cart</Button>
</template>

