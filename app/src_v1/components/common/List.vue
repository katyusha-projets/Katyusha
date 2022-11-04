<script setup lang="ts">
import NumberUtils from '~/core/utils/NumberUtils'

interface ListProps {
  data: Array<Record<string, any>>
  titleKey: string
  valueKey: string
  imageKey: string
  urlPath: string
  urlItemKey: string
}

const props = withDefaults(defineProps<ListProps>(), {
})

</script>

<template>
  <div class="countries">
    <div class="countries__list">
      <router-link v-for="item in data" :key="item.id" :to="`/${urlPath}/${item[urlItemKey]}`" class="countries__item pointer-cursor">
        <div class="countries__flag">🇺🇸</div>
        <div class="countries__title">{{ item[titleKey] }}</div>
        <div class="countries__price">{{ NumberUtils.usd(item[valueKey]) }}</div>
      </router-link>
    </div>
  </div>
</template>
