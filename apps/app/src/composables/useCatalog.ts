import $services from '~/app/services'

export const useCatalog = () => {
  const featuredProducts = ref([])

  const fetchFeaturedProducts = async () => {
    featuredProducts.value = await $services.product.fetch()
  }

  return { featuredProducts, fetchFeaturedProducts }
}
