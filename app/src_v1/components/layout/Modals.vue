<script setup lang="ts">
import { useModalStore } from '~/store/modals'
const modalStore = useModalStore()
</script>

<template>
  <!--Stock modal-->
  <Modal :open="modalStore.modalState.stock" size="medium" actions="center" noscroll @close="modalStore.closeStock">
    <template #header>
      <van-nav-bar
        :title="modalStore.data.stock?.name"
        left-text="Back"
        left-arrow
      />
    </template>
    <template #content>
      <TickerView v-if="modalStore.data.stock" :key="modalStore.data.stock.ticker" :ticker="modalStore.data.stock.ticker" />
    </template>
  </Modal>

  <!--Product modal-->
  <Modal :open="modalStore.modalState.product" size="medium" actions="center" noscroll @close="modalStore.closeProduct">
    <template #header>
      <van-nav-bar
        :title="modalStore.data.product?.name"
        left-text="Back"
        left-arrow
      />
    </template>
    <template #content>
      <ProductDetails v-if="modalStore.data.product" :product="modalStore.data.product" />
    </template>
  </Modal>

  <!--Cart modal-->
  <Modal :open="modalStore.modalState.cart" size="medium" actions="center" noscroll @close="modalStore.close.cart">
    <template #header>
      <van-nav-bar
        title="Checkout"
        left-text="Back"
        left-arrow
      />
    </template>
    <template #content>
      <Cart v-if="modalStore.modalState.cart" />
    </template>
  </Modal>

  <!--Search modal-->
  <Modal :open="modalStore.modalState.search" size="medium" actions="center" noscroll @close="modalStore.close.search">
    <template #header>
      <van-nav-bar
        title="Search"
        left-text="Back"
        left-arrow
      />
    </template>
    <template #content>
      <SearchProducts />
    </template>
  </Modal>

  <!--Favorites modal-->
  <Modal :open="modalStore.modalState.favorites" size="medium" actions="center" noscroll @close="modalStore.close.favorites">
    <template #header>
      <van-nav-bar
        title="Favorites"
        left-text="Back"
        left-arrow
      />
    </template>
    <template #content>
      <FavoriteProducts />
    </template>
  </Modal>

  <!--Account modal-->
  <Modal :open="modalStore.modalState.profile" size="medium" actions="center" noscroll @close="modalStore.close.profile">
    <template #header>
      <van-nav-bar
        title="Account"
        left-text="Back"
        left-arrow
      />
    </template>
    <template #content>
      <AccountModal />
    </template>
  </Modal>
</template>
