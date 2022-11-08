<script lang="ts" setup>
import { useProductService } from '~/composables/useProductService'

type ProductListProps = {
  title?: string
  subtitle?: string
  categoryNamespace?: string
  categoryId?: string
}

const props = defineProps<ProductListProps>()
const service = useProductService()
const { results } = service
service.fetch()

const selectedProduct = ref({})
const loadProduct = async(id: string) => {
  // selectedProduct.value = {}
  // selectedProduct.value = await service.get(id)
  // modalOpen.value = true
}
</script>

<template>
  <section>
    <section v-if="results.length">
      <CardsList :subtitle="subtitle" :title="title" :on-click="(id: string) => loadProduct(id)" :cards="$_.map(results, 'props.card')" />
    </section>
  </section>
</template>
