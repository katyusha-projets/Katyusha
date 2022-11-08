<script lang="ts" setup>

type StatsProps = {
  vertical?: boolean
  stats: Array<{
    title: string
    value: string
    description?: string
    image?: string
    icon?: any
    actions?: Array<{
      title: string
      onClick: () => {}
    }>
  }>
}

const props = defineProps<StatsProps>()
</script>

<template>
  <div class="stats flex" :class="props.vertical ? 'stats-vertical' : ''">
    <div v-for="item in props.stats" :key="item.title" class="stat flex-grow place-items-center">
      <div v-if="item.icon" class="stat-figure text-primary"><component :is="item.icon" /></div>
      <div v-if="item.image" class="stat-figure text-secondary"><div class="avatar online"><div class="w-16 rounded-full"><img :src="item.image" /></div></div></div>
      <div class="stat-value font-bold">{{ item.value }}</div>
      <div class="stat-title mt-2">{{ item.title }}</div>
      <div v-if="item.description" class="stat-desc mt-2">{{ item.description }}</div>
      <div v-if="item.actions" class="stat-actions">
        <button v-for="action in item.actions" :key="action.title" class="btn btn-sm btn-success" @click="action.onClick">{{ action.title }}</button>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
.stats {
  background: transparent !important;
  color: #FFF !important;
  border:none !important;

  * {
    color: #FFF !important;
  }

  .stat-desc {
    max-width: 78%;
    white-space: break-spaces;
  }
}
</style>
