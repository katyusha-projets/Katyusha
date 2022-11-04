<script lang="ts" setup>

type MasonryProps = {
  images?: Array<string>
  width: number
}

const props = defineProps<MasonryProps>()
</script>

<template>
  <masonry-wall :items="images" :ssr-columns="1" :column-width="props.width" :gap="4">
    <template #default="{ item }">
      <img class="rounded" :src="item" />
    </template>
  </masonry-wall>
</template>
