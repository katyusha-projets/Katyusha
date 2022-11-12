<script lang="ts" setup>
import { useUserStore } from '~/store/user'
const userStore = useUserStore()
</script>

<template>
  <section>
    <CustomerAddressForm v-if="userStore.session.customer" />
    <LoginRegisterForm v-else />
  </section>
</template>
