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
  <div class="cart-button" @click="addToCart"><i class="fa-light fa-basket-shopping-simple" /><span>Add to cart</span></div>
</template>

<style lang="scss">
.cart-button {
  $height:42px;
  height:$height;
  line-height: $height;
  border-radius: 8px;
  background-color: #FFF;
  padding: 0 1rem;
  text-align: center;
  flex-grow: 1;
  margin-right: 0.5rem;

  span {
    color: #000;
    font-size: 0.8rem;
  }

  i {
margin-right: .25rem;
  }
}
</style>
