<script setup lang="ts">
import { defineProps } from 'vue'
import { ICategory } from '~/interfaces/ProductInterfaces'

const activeName = ref<string>('')

interface Props {
  categories: Array<ICategory>
}

const props = defineProps<Props>()
</script>

<template>
  <template v-for="category in categories">
    <section v-if="category.products.length" :key="category.id" class="category">
      <h2 v-if="false"><span>{{ category.name }}</span></h2>
      <ProductCardContainer :products="category.products" />
    </section>
  </template>
</template>

<style lang="scss" scoped>

.category {
}

h2 {
  text-align: left;
  margin-bottom: 0.25rem;
  padding-left: 0.75rem;
  position: relative;
  line-height: 3rem;
  background: #000;
  color: #FFF;
  max-width: 99vw;
  border-radius: 0 2px 2px 0;

  span {
    margin-bottom: 0;
    padding-right: 1rem;
    font-weight: 300;
    font-size: 1.4rem;
    text-transform: uppercase;
  }

}
</style>
