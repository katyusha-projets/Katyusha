<script lang="ts" setup>
import { useCart } from '~/composables/useCart'
import { useOrderStore } from '~/store/order'

const cart = useCart()
const orderStore = useOrderStore()
</script>

<template>
  <section>
    <OrderPayment />
    <LineItem v-for="item in orderStore.cartItems" :key="item.id" :item="item" />
  </section>
</template>

<style lang="scss" scoped>
</style>
