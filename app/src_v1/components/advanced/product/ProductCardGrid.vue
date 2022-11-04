<script setup lang="ts">

import { useModalStore } from '~/store/modals'
import { ProductType } from '~/types'

interface ProductGridProps {
  products: Array<ProductType>
  horizontal?: boolean
  pulled?: boolean
  sideGrid?: boolean
}

const props = withDefaults(defineProps<ProductGridProps>(), {
  products: () => [],
  horizontal: false,
  pulled: false,
  sideGrid: false
})

const blockClasses = computed(() => [props.sideGrid && 'is-side-grid'])
const modalStore = useModalStore()
const columnClasses = computed(() => [props.sideGrid ? 'is-4' : 'is-3'])

const listClasses = props.horizontal ? 'horizontal' : 'columns is-multiline b-columns-half-tablet-p b-columns-third-tablet-l'
const itemClasses = props.horizontal ? 'horizontal' : 'column is-4'
</script>

<template>
  <div>
    <div class="nft-grid" :class="blockClasses">
      <div class="grid-inner">
        <TransitionGroup name="list" tag="div" :class="listClasses">
          <ProductCard v-for="product in props.products" :key="product.id" :class="itemClasses" :product="product" @product-click="(namespace: string) => modalStore.openProduct(namespace)" />
        </TransitionGroup>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.nft-grid {
  position: relative;

  .columns {
    justify-content: space-between;
    margin: 0;
  }

  :deep(.collection-title) {
    margin-bottom: 1.5rem;
  }

  .column {

    &.is-4 {
      width:32%;
      padding: 0.35rem;
      margin-bottom: 1rem;

      @media (max-width: 720px) {
        width: 100%;
      }
    }
  }
}

.grid-inner {
  display: flex;
  flex-wrap: wrap;
}

@media only screen and (min-width: 768px) and (max-width: 1000px) and (orientation: landscape) {
  .nft-grid {
    &.is-side-grid {
      .column {
        width: 50% !important;
        min-width: 50% !important;
      }
    }
  }
}
</style>
