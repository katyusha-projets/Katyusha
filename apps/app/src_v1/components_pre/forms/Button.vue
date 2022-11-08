<script lang="ts" setup>

type ButtonProps = {
  title: string
}

const props = defineProps<ButtonProps>()
</script>

<template>
  <button class="btn">{{ props.title }}</button>
</template>

<style lang="scss">
button.btn {
  border: 1px solid var(--color-button);
  box-shadow: none;
  outline: none;
  text-transform: none;
  font-size: 0.9rem;
  letter-spacing: .1rem;
  background-color: transparent;
  color:var(--color-button);
  height:var(--button-height);
  line-height: var(--button-height);

  &:hover {
    background: var(--color-button);
    color:#FFF;
  }
}
</style>
