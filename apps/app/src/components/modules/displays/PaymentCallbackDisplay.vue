<script lang="ts" setup>
const active = ref<boolean>(false)
const pending = ref<boolean>(true)
const success = ref<boolean>(false)

onMounted(() => {
  if(window.location.href.includes('payment_intent')) active.value = true
})
</script>

<template>
  <section v-if="false" id="payment-callback">
    <template v-if="pending">
      <div class="heading">Payment confirmation</div>
      <PreloaderFingerprint />
      <div class="message">Please wait...</div>
    </template>
    <template v-else>
      <template v-if="success">
      </template>
      <template v-else>
      </template>
    </template>
  </section>
</template>
