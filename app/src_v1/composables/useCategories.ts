import $services from '~/app/services'

export const useCategories = () => {
  const results = ref([])

  const fetch = async () => {
    results.value = await $services.category.fetch()
  }

  return { results, fetch }
}
