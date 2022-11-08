<script lang="ts" setup>

type SeparatorWaveProps = {
  dark?: boolean
}

const props = defineProps<SeparatorWaveProps>()
</script>

<template>
  <svg
    :class="dark ? 'dark' : ''"
    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    viewBox="0 0 1920 115.9" style="enable-background:new 0 0 1920 115.9;" xml:space="preserve"
  >
    <path
      class="st1" d="M1600.7,0C1401,0,1159.4,100,960.1,100S519.1,0,319.5,0S-2,50-2,50l0.1,67.9l1924,0l0-67.9
	C1922,50,1800.3,0,1600.7,0z"
    />
  </svg>
</template>

<style lang="scss" scoped>
svg {
  position: absolute;
  bottom: -3px;
  left: -4px;
  right: 0;
  width: calc(100% + 8px) !important;
  max-width: calc(100% + 8px) !important;
  z-index: 10;

  .st0{fill:none;}
  .st1{fill:#FFFFFF;}

  &.dark {
    .st1{fill:var(--bg-dark);}
  }
}
</style>
