<script lang="ts" setup>
import { useCatalog } from '~/composables/useCatalog'
import { useCategories } from '~/composables/useCategories'
import { useShopStore } from '~/store/shop'
const shopStore = useShopStore()
const { categories, fetch } = useCategories()
const { fetchFeaturedProducts, featuredProducts } = useCatalog()
fetch()
fetchFeaturedProducts()
const searchTerm = ref<string>('')
</script>

<template>
  <section>
    <van-search v-model="searchTerm" placeholder="Search for anything..." />
    <ShopBanners class="mb-8" />
    <ShopProductNavigation :categories="categories">
      <template #after-categories>
        <div class="full-width">
          <ProductCardContainer :slider="true" title="🔥 Featured products" :products="featuredProducts" class="mt-4" />
        </div>
      </template>
    </ShopProductNavigation>
    <section class="full-width bg-black pt-2 rounded">
      <CategoryDisplay :categories="categories" />
    </section>
  </section>
</template>

<style lang="scss">
.banner {
  background-size: cover;
  background-position: center;
  height:220px;
  width:100%;
  border-radius: 10px;
}
</style>
