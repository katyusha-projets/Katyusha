<script setup async lang="ts">
import Bootstrap from "~/app/Bootstrap";

Bootstrap.app()
</script>

<template>
  <Suspense>
    <RouterView />
  </Suspense>
</template>
