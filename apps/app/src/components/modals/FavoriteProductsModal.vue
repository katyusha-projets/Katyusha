<script lang="ts" setup>
const catalogStore = useCatalogStore()
</script>

<template>
  <div>
    <div class="px-2 pt-2">
      <ProductCardContainer :horizontal="true" :products="catalogStore.favorites" />
    </div>
  </div>
</template>
