import { Ref } from 'vue-demi'
import $services from '~/app/services'
import { ProductType } from '~/types'

export const useProductService = () => {
  const results: Ref<Array<ProductType>> = ref([])
  const featured: Ref<Array<ProductType>> = ref([])
  const product: Ref<ProductType|null> = ref(null)

  const fetch = async () => {
    results.value = await $services.product.fetch()
  }

  const get = async (id: any) => {
    product.value = await $services.product.get(id)
  }

  const getFeatured = async () => {
    featured.value = await $services.product.getFeatured()
  }

  return { results, fetch, product, get, featured, getFeatured }
}
