<script lang="ts" setup>
import { useCart } from '~/composables/useCart'
import { useOrderStore } from '~/store/order'

const termsChecked = ref<boolean>(false)
const paymentOpen = ref<boolean>(false)

const cart = useCart()
const orderStore = useOrderStore()

</script>

<template>
  <section>
    <OrderPayment class="px-4" />
    <h2 class="px-4">Your cart</h2>
    <div class="px-2">
      <LineItem v-for="item in orderStore.cartItems" :key="item.id" :item="item" />
    </div>
  </section>
</template>
