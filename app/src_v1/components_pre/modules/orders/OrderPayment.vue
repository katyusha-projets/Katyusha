<script lang="ts" setup>
import OrderService from '~/app/services/OrderService'
import { useOrderStore } from '~/store/order'
const service = new OrderService()

const store = useOrderStore()
const loaded = ref<boolean>(false)

onMounted(async () => {
  const stripe = await service.stripeCheckout()
  await stripe.render('#payment-element')
  loaded.value = true
})

</script>

<template>
  <div>
    <PreloaderFingerprint v-show="!loaded" />
    <transition name="slide">
      <form v-show="loaded" id="payment-form">
        <div id="payment-element"></div>
        <button id="submit">
          <span><Status color="blue" />Pay now</span>
        </button>
        <div class="cancel" @click="store.closePaymentModal"><span>Cancel</span></div>
        <div id="error-message"></div>
      </form>
    </transition>
  </div>
</template>
