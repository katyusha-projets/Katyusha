<script lang="ts" setup>
import { defineEmits } from 'vue'

type SearchFieldProps = {
  modelValue: string
}

const props = defineProps<SearchFieldProps>()

const emit = defineEmits(['update:modelValue'])

const updateValue = (event: any) => {
  emit('update:modelValue', event.target.value)
}
</script>

<template>
  <div>
    <label for="default-search" class="mb-2 text-sm font-medium  sr-only dark:text-gray-300">Search</label>
    <div class="relative">
      <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
        <Icon icon="magnifying-glass" />
      </div>
      <input :value="modelValue" type="search" class="block p-4 pl-10 w-full text-sm  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Mockups, Logos..." required @input="updateValue">
      <button type="submit" class="text-white absolute right-2.5 bottom-2.5   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Search</button>
    </div>
  </div>
</template>

<style lang="scss" scoped>
svg {
fill
}
</style>
