<script setup lang="ts">

interface PageCardProps {
  title: string
}

const props = withDefaults(defineProps<PageCardProps>(), {
})
</script>

<template>
  <div class="card">
    <div class="card__head">
      <div class="title-blue card__title">{{ title }}</div>
    </div>
    <slot />
  </div>
</template>
