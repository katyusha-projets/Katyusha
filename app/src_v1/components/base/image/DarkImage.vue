<script setup lang="ts">

export interface DarkImageProps {
  src: string
  srcDark?: string
  alt?: string
  width?: string
  height?: string
  inline?: boolean
}

const props = withDefaults(defineProps<DarkImageProps>(), {
  alt: undefined,
  srcDark: undefined,
  width: '800',
  height: '600'
})
const classes = computed(() => (props.inline ? 'inline' : 'block'))
const src = props.src
</script>

<template>
  <img
    :class="classes"
    :src="src"
    :alt="props.alt"
    :width="props.width"
    :height="props.height"
  />
</template>

<style lang="scss" scoped>
img {
  width: 100%;

  &.inline {
    display: inline-block;
  }

  &.block {
    display: block;
  }
}
</style>
