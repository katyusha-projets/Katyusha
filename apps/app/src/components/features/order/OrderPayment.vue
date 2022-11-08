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
  <div id="payment" class="mt-4">
    <transition name="slide">
      <form v-show="loaded" id="payment-form">
        <div id="payment-element"></div>
        <Button id="submit" color="primary" class="w-full mt-4 pay-button" raised bold>Pay now</Button>
        <div class="cancel" @click="store.closePaymentModal"><span>Cancel</span></div>
        <div id="error-message"></div>
      </form>
    </transition>
  </div>
</template>

<style lang="scss" scoped>
#payment {
  height:414px;
}

.pay-button {
  background-color: #000 !important;
  color: #FFF !important;
}

.cancel {
  text-align: center;
  margin-top: 1rem;
}
</style>
