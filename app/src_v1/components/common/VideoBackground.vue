<script lang="ts" setup>

type VideoBackgroundProps = {
  dir: string
  fileName: string
}

const props = defineProps<VideoBackgroundProps>()
</script>

<template>
  <video autoplay muted loop>
    <source :src="`${props.dir}/${props.fileName}.mp4`" type="video/mp4">
    <source :src="`${props.dir}/${props.fileName}.webm`" type="video/webm">
  </video>
</template>
