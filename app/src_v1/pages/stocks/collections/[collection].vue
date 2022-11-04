<script setup lang="ts">

const router = useRoute()
const { collection } = router.params
</script>

<template>
  <div class="dash">
    <div class="page__container">
      <StocksIndexView :namespace="collection" />
    </div>
  </div>
</template>
