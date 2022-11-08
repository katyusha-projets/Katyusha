<script lang="ts" setup>
import { defineEmits } from 'vue'

type InputProps = {
  modelValue: string
  placeholder: string
  type?: string
}

const props = defineProps<InputProps>()
const emit = defineEmits(['update:modelValue'])
const updateValue = (event: any) => emit('update:modelValue', event.target.value)

const isSearch = props.type === 'search'
</script>

<template>
  <div class="relative input-cnt">
    <div v-if="isSearch" class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
      <Icon icon="magnifying-glass" />
    </div>
    <input :placeholder="props.placeholder" :type="props.type ?? 'text'" :value="modelValue" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full" @input="updateValue">
  </div>
</template>
