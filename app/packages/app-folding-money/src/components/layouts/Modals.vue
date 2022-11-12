<script setup lang="ts">
import { useModalStore } from '~/store/modals'
const modalStore = useModalStore()
</script>

<template>
  {{modalStore.modalState}}
  <!--Stock modal-->
  <Modal v-if="false" :open="modalStore.modalState.stock" size="medium" actions="center" noscroll @close="modalStore.closeStock">
    <template #header>
      <van-nav-bar
        :title="modalStore.data.stock?.name"
        left-text="Back"
        left-arrow
        @click-left="() => modalStore.closeStock()"
      />
    </template>
    <template #content>
<!--      <StocksTickerDisplay v-if="modalStore.data.stock" :key="modalStore.data.stock.ticker" :ticker="modalStore.data.stock.ticker" />-->
    </template>
  </Modal>


  <!--Account modal-->
  <Modal :open="modalStore.modalState.profile" size="medium" actions="center" noscroll @close="modalStore.close.profile">
    <template #header>
      <van-nav-bar
        title="Account"
        left-text="Back"
        left-arrow
        @click-left="() => modalStore.close.profile()"
      />
    </template>
    <template #content>
      <AccountModal />
    </template>
  </Modal>
</template>

<style lang="scss">
#product-modal {
  .swipe-modal-takumaru-vue-swipe-modal {
    z-index: 100001;
  }
}
</style>
