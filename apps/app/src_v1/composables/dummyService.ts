import $services from '~/app/services'

export const useDummyService = () => {
  const response = ref(null)
  const fetch = async () => {
    response.value = await $services.dummy.fetch()
  }

  return { response, fetch }
}
