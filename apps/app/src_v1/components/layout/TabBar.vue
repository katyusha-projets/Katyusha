<script lang="ts" setup>
import { useModalStore } from '~/store/modals'
import { useOrderStore } from '~/store/order'
const modalStore = useModalStore()
const orderStore = useOrderStore()
</script>

<template>
  <Suspense>
    <section>
      <div :class="`tab-bar-container ${modalStore.isAModalOpen ? 'modal-open' : ''}`">
        <nav class="tab-bar">
          <div :class="`${modalStore.modalState.search ? 'active' : ''}`" @click="modalStore.open.search"><i class="fa-light fa-magnifying-glass" /><span>Search</span></div>
          <div :class="`${modalStore.modalState.cart ? 'active' : ''}`" @click="modalStore.open.cart"><div v-if="itemsCount" class="badge">{{ orderStore.itemsCount }}</div><i class="fa-light fa-basket-shopping-simple" /><span>Cart</span></div>
          <div :class="`${modalStore.modalState.favorites ? 'active' : ''}`" @click="modalStore.open.favorites"><i class="fa-light fa-heart" /><span>Favorites</span></div>
          <div :class="`${modalStore.modalState.profile ? 'active' : ''}`" @click="modalStore.open.profile"><i class="fa-light fa-user" /><span>Profile</span></div>
        </nav>
        <div v-if="modalStore.isAModalOpen" class="close-modal" @click="modalStore.closeAll">
          <i class="fa-light fa-xmark"></i>
        </div>
      </div>
    </section>
  </Suspense>
</template>

<style lang="scss">
.close-modal {
  backdrop-filter: blur(8px);
  background-color: rgba(0, 0, 0, 0.95);
  width: 40px;
  height: 40px;
  margin-right: 0.6rem;
  border-radius: 100px;
  color: #FFF;
  text-align: center;
  line-height: 40px;
  margin-left: 0.6rem;
}

#login-banner {
  position: fixed;
  top: 1rem;
  right: 1rem;
  z-index: 10000;
}

.van-action-sheet {
  height: 70vh !important;
  min-height: 70vh !important;
}

#action-sheet-new-activity {
  z-index: 100000000;
}

.stripe-checkout-btn-wrapper {
  width: 280px;
  border-radius: 6px;
  margin-bottom: 1rem;
  background: transparent;
  padding: 0.5rem;
  backdrop-filter: blur(11px);
}

.stripe-checkout {
  display: block;
  width:100%;
  margin: 0 auto;
  color: #FFF;
  border-radius: 6px;
  height: 48px;
  line-height: 48px;
  font-size: 1.2rem;
  font-weight: bold;
  background: var(--primary);
  box-shadow: 0 1px 15px -10px rgb(0 0 2 / 70%);
  transition: 0.2s ease all;
  border-top: 1px solid #4c11b3;
  border-bottom: 1px solid #220752;

  &:hover {
    margin-bottom: .1rem;
    box-shadow: 0 5px 11px -9px rgb(23 23 77 / 37%);
  }

  svg {
    display: inline;
    height: 46px;
    width: 46px;
    fill: #fff;
    margin-top: -3px;
  }

  img {
    display: inline;
    height: 51px;
    margin: -4px 0 0;
  }

  span {
    display:inline-block;
    position: relative;
  }

  .status-container {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: -2.5rem;
    margin-top: -2px;
  }
}

.tab-bar-container {
  place-items: center;
  display: flex;
  justify-content: space-between;
  position: fixed;
  left: 50%;
  z-index: 1000;
  bottom: 0.5rem;
  transform: translateX(-50%);
}

.tab-bar {
  $btnHeight: 40px;
  place-items: center;
  display: flex;
  justify-content: space-between;
  padding: 0.5rem 1.1rem 0.5rem .5rem;
  -webkit-backdrop-filter: blur(8px);
  backdrop-filter: blur(8px);
  background-color: rgba(0, 0, 0, 0.95);
  border-radius: 100px;

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  div,
  a {
    color: #fff;
    cursor: pointer;
    text-decoration: none;
    display: flex;
    align-items: center;
    padding: 0 1.5rem;
    margin-left: 0.6rem;
    border-radius: 50px;
    position: relative;
    height: $btnHeight;
    line-height: $btnHeight;

    i {
      margin-right: -2.5rem;
      width: 28px;
      height: $btnHeight;
      line-height: $btnHeight;
      display: block;
      pointer-events: none;
      transition: margin 0.2s ease-out;
      color: #FFF;
    }

    span {
      font-family: var(--heading-font);
      opacity: 0;
      font-size: 0.9rem;
      display: none;
    }

    &:before {
      position: absolute;
      content: "";
      top: 50%;
      left: 0;
      width: 70px;
      height: 70px;
      border-radius: 50%;
      transform: translate(0%, -50%) scale(0);
      visibility: visible;
      opacity: 1;
    }

    &.active {
      background-color: #FFF;

      &:before {
        background-color: #FFF;
        opacity: 0;
        visibility: hidden;
        transform: translate(0%, -50%) scale(2);
        transition: all 0.4s ease-out;
      }

      i {
        color: #000;
        margin-right: 0;
      }

      span {
        color: #000;
        font-family: var(--heading-font);
        font-weight: bold;
        visibility: visible;
        opacity: 1;
        transition: all 0.2s ease-out;
        display: inline;
      }
    }
  }

  @media (max-width: 500px) {
    nav {
      flex-direction: column;
      justify-self: start;
      border-radius: 0 30px 30px 0;
      padding: 2rem 1.15rem 2rem 0.75rem;

      div {
        margin: 0.5rem 0;
      }

      i {
        margin: 0;
      }
    }
  }
}
</style>
