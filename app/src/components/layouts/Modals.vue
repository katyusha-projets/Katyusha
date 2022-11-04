<script setup lang="ts">
import StocksTickerDisplay from '~/components/modules/displays/StocksTickerDisplay.vue'
import { useModalStore } from '~/store/modals'
const modalStore = useModalStore()
</script>

<template>
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
      <StocksTickerDisplay v-if="modalStore.data.stock" :key="modalStore.data.stock.ticker" :ticker="modalStore.data.stock.ticker" />
    </template>
  </Modal>

  <!--Product modal-->
  <Modal id="product-modal" :open="modalStore.modalState.product" size="medium" actions="center" noscroll @close="modalStore.closeProduct">
    <template #header>
      <van-nav-bar
        :title="modalStore.data.product?.name"
        left-text="Back"
        left-arrow
        @click-left="() => modalStore.closeProduct()"
      />
    </template>
    <template #content>
      <ProductScreen v-if="modalStore.data.product" :product="modalStore.data.product" />
    </template>
  </Modal>

  <!--Cart modal-->
  <Modal :open="modalStore.modalState.cart" size="medium" actions="center" noscroll @close="modalStore.close.cart">
    <template #header>
      <van-nav-bar
        title="Checkout"
        left-text="Back"
        left-arrow
        @click-left="() => modalStore.close.cart()"
      />
    </template>
    <template #content>
      <CartModal v-if="modalStore.modalState.cart" />
    </template>
  </Modal>

  <!--Search modal-->
  <Modal :open="modalStore.modalState.search" size="medium" actions="center" noscroll @close="modalStore.close.search">
    <template #header>
      <van-nav-bar
        title="Search"
        left-text="Back"
        left-arrow
        @click-left="() => modalStore.close.search()"
      />
    </template>
    <template #content>
      <ProductSearchModal />
    </template>
  </Modal>

  <!--Favorites modal-->
  <Modal :open="modalStore.modalState.favorites" size="medium" actions="center" noscroll @close="modalStore.close.favorites">
    <template #header>
      <van-nav-bar
        title="Favorites"
        left-text="Back"
        left-arrow
        @click-left="() => modalStore.close.favorites()"
      />
    </template>
    <template #content>
      <FavoriteProductsModal />
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
