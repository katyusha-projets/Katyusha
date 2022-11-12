<script lang="ts" setup>

// import Bootstrap from '~/app/Bootstrap'
// import { useModalStore } from '~/store/modals'
// import { useOrderStore } from '~/store/order'
//
// const orderStore = useOrderStore()
// const modalStore = useModalStore()
//
// onMounted(() => {
//   Bootstrap.app()
// })
</script>

<template>
  <main class="relative flex-grow" style="min-height:-webkit-fill-available;-webkit-overflow-scrolling:touch">
    <div class="mx-auto max-w-[1920px] px-4 md:px-8 2xl:px-16">
      <AppHeader />
      <RouterView />
    </div>
    <Modals />
    <PaymentCallbackDisplay />
    <TabBar />
    <!--    <Cart v-if="modalStore.paymentModalOpen" />-->
    <!--    <AppFooter />-->
  </main>
</template>

<style scoped>
main {
  margin-top: 60px;
}
</style>
