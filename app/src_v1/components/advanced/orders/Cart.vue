<script lang="ts" setup>
import { useCart } from '~/composables/useCart'
import { useOrderStore } from '~/store/order'
import { currencySymbol } from '~/app/config/appConfig'

const termsChecked = ref<boolean>(false)
const paymentOpen = ref<boolean>(false)

const cart = useCart()
const orderStore = useOrderStore()

</script>

<template>
  <section>
    <OrderPayment v-if="paymentOpen" class="px-4" />
    <template v-else>
      <div class="px-2 pb-48">
        <LineItem v-for="item in orderStore.cartItems" :key="item.id" :item="item" />
      </div>
      <van-submit-bar :currency="currencySymbol" :decimal-length="0" :price="orderStore.order?.paymentAmount * 100" button-text="Proceed to payment" @submit="paymentOpen = true">
        <van-checkbox v-model="termsChecked">I have read the terms</van-checkbox>
      </van-submit-bar>
    </template>
  </section>
</template>
