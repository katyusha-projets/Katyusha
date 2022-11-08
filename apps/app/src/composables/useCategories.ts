import $services from '~/app/services'

export const useCategories = () => {
  const categories = ref([])

  const fetch = async () => {
    categories.value = await $services.category.fetch()
  }

  return { categories, fetch }
}
