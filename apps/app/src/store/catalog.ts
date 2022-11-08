import { acceptHMRUpdate, defineStore } from 'pinia'
import { ProductType } from '~/types'

export const useCatalogStore = defineStore('catalog', () => {
  const favorites = ref<Array<ProductType>>([])

  const setFavorites = (items: Array<ProductType>) => {
    favorites.value = items
  }

  return { setFavorites, favorites }
})

if (import.meta.hot) import.meta.hot.accept(acceptHMRUpdate(useOrderStore, import.meta.hot))