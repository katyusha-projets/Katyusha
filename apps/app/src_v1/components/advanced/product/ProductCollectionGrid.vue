<script setup lang="ts">
import type { ProductCollection } from '@components/advanced/nft/nft-collection-card/ProductCollectionCard.vue'

export interface ProductCollectionGridProps {
  items: ProductCollection[]
  pulled?: boolean
}

const props = withDefaults(defineProps<ProductCollectionGridProps>(), {
  items: () => [],
  inverted: false
})
</script>

<template>
  <div class="py-6">
    <div class="nft-collection-grid">
      <slot name="title"></slot>

      <div class="grid-inner">
        <div class="columns is-multiline b-columns-half-tablet-p">
          <div
            v-for="(item, index) in props.items"
            :key="index"
            class="column is-3"
          >
            <ProductCollectionCard :content="item" flat />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.nft-collection-grid {
  position: relative;

  :deep(.collection-title) {
    margin-bottom: 1.5rem;
  }
}
</style>
