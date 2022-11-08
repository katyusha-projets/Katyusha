<script async setup lang="ts">
import { useCategories } from '~/composables/useCategories'
import { useProductService } from '~/composables/useProductService'

const router = useRouter()
const productService = useProductService()
const categoryService = useCategories()

const { results } = categoryService

const term = ref('')
const currentTab = ref('')
productService.fetch()
await categoryService.fetch()

watch(term, (currentValue, oldValue) => {
  // serviceSearch.search(productService, currentValue)
})

</script>

<template>
  <div>
    <Hero />
    <div class="container">
      <van-tabs v-model:active="currentTab" :scrollspy="true">
        <template v-for="category in results" :key="category.id">
          <van-tab :title="category.name">
            <h2>{{ category.name }}</h2>
            <ProductCardGrid :products="category.products" />
          </van-tab>
        </template>
      </van-tabs>
    </div>
  </div>
</template>

<style lang="scss" scoped>

.slider-container {
  background: #060611;
  padding: 1rem 0;
  color: #FFF;
  text-align: center;
  border-top: 1px solid #1d0f34;
  border-bottom: 1px solid #1d0f34;

  .heading {
    font-size: 3rem;
    padding: 3rem 0;
  }
}

.ukraine-line {
  position: relative;

  &:before, &:after {
    content:"";
    display:block;
    position: absolute;
    left:0;
    right:0;
    bottom:0;
    height:2px;
  }

  &:before {
    background-color: var(--ua-blue);
    transform: rotate(-3deg);
  }

  &:after {
    background-color: var(--ua-yellow);
    transform: rotate(1deg);
    bottom:-2px;
  }
}

</style>
