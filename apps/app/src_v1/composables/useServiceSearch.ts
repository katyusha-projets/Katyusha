import Service from '~/app/services/Service'

export const useServiceSearch = () => {
  const results = ref([])

  const search = async (service: Service<any>, term: string) => {
    if(!term) {
      results.value = []
      return
    }

    results.value = await service.search(term)
  }

  return { results, search }
}
