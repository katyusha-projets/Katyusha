<script setup lang="ts">
import Bootstrap from '~/app/Bootstrap'

Bootstrap.app()
</script>

<template>
  <Suspense>
    <RouterView />
  </Suspense>
</template>

<style lang="scss">
.full-width {
  width: 100vw;
  left: -1rem;
  position:relative;
}

#app {
  max-width:100vw;
  overflow-x: hidden;
}

.bg-black {
  background-color: #000;
}

.bg-gray {
  background-color: #f9f9f9;
}

.bg-white {
  background-color: #FFF;
}
</style>
