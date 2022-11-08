import { acceptHMRUpdate, defineStore } from 'pinia'

export const useShopStore = defineStore('shop', () => {
  const currentShop = ref<any>({})
  const setShop = (shop: any) => {
    console.log(shop)
    console.log(shop)
    console.log(shop)
    console.log(shop)
    console.log(shop)
    currentShop.value = shop
  }

  return { setShop, currentShop }
})

if (import.meta.hot) import.meta.hot.accept(acceptHMRUpdate(useShopStore, import.meta.hot))
