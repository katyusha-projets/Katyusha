<script lang="ts" setup>
import { useUserStore } from '~/store/user'

const userStore = useUserStore()

</script>

<template>
  <section>
    <CustomerAddressForn v-if="userStore.session.customer" />
    <LoginRegisterForm v-else />
  </section>
</template>
