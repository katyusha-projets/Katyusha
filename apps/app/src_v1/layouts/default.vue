<script lang="ts" setup>
import Bootstrap from '~/app/Bootstrap'
import { useModalStore } from '~/store/modals'
import { useOrderStore } from '~/store/order'

const orderStore = useOrderStore()
const modalStore = useModalStore()

onMounted(() => {
  Bootstrap.app()
})
</script>

<template>
  <main>
    <Modals />
    <RouterView />
    <TabBar />
    <Cart v-if="modalStore.paymentModalOpen" />
    <AppFooter />
  </main>
</template>
