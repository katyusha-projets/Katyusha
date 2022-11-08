<script lang="ts" setup>
import AddToFavoritesAction from '~/app/actions/cart/UpdateQty'
import LineItemService from '~/app/services/LineItemService'
import { LineItemType } from '~/types/OrderTypes'
import { currencySymbol } from '~/app/config/appConfig'
import { useCart } from '~/composables/useCart'

const cartService = useCart()
const lineItemService = new LineItemService()

type LineItemProps = {
  item: LineItemType
}

const props = defineProps<LineItemProps>()
const qty = ref<number>(props.item.qty)

const remove = () => {
  cartService.removeLineItem(props.item.id)
}

const updateQty = () => {
  AddToFavoritesAction.run(props.item.id, qty.value)
}

watch(qty, () => {
  updateQty()
})
</script>

<template>
  <van-card
    :currency="currencySymbol"
    :num="qty"
    :desc="item.product.description"
    :price="item.payable_unit_price * qty"
    :title="item.product.name"
    :thumb="item.product.image"
  >
    <template #num>
      <Icon icon="trash-xmark" @click="remove" />
    </template>
    <template #footer>
      <van-stepper v-model="qty" />
    </template>
  </van-card>
</template>
