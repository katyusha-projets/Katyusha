<script setup lang="ts">
import { StatusColors } from '~/components/common/types'

type StatusProps = {
  title?: string
  dot?: boolean
  noAnimation?: boolean
  color: StatusColors
}

const props = defineProps<StatusProps>()

</script>

<template>
  <div class="status-container">
    <template v-if="!props.title && props.dot">
      <span class="status-indicator status-indicator-animated" :class="`status-${props.color}`">
        <span class="status-indicator-circle"></span>
        <span class="status-indicator-circle"></span>
        <span class="status-indicator-circle"></span>
      </span>
    </template>
    <template v-else>
      <span class="status" :class="`status-${props.color}`"><span class="status-dot" :class="!props.noAnimation ? 'status-dot-animated' : ''"></span>{{ props.title }}</span>
    </template>
  </div>
</template>
