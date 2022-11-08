<script lang="ts" setup>
import { defineProps, ref } from 'vue'
import swipeModal from '@takuma-ru/vue-swipe-modal'
const isModal = ref(false)
const components = [swipeModal]

interface ModalEmits {
  (e: 'close'): void
}

interface ModalProps {
  open?: boolean
}

const isOpen = ref<boolean>()
const props = defineProps<ModalProps>()
const emit = defineEmits<ModalEmits>()

watch(isOpen, (value, prevVal) => {
  console.log('Closing')
  if(!value) emit('close')
})

watch(() => props.open, (value, prevVal) => {
  console.log(prevVal, value)
  if(value) isOpen.value = true
})
</script>

<template>
  <div>
    <swipe-modal v-model="isOpen" :fullscreen="true">
      <slot name="header" />
      <slot name="content" />
    </swipe-modal>
  </div>
</template>

<style lang="scss">
.modal-contents {
  height:100vh;
}

.swipe-modal-takumaru-vue-swipe-modal {
  z-index: 100000;
}
</style>
