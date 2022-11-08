import { acceptHMRUpdate, defineStore } from 'pinia'
import { OrderType } from '~/types/OrderTypes'

export const useOrderStore = defineStore('order', () => {
  const order = ref<OrderType|null>(null)

  const cartItems = computed(() => order.value?.line_items)
  const itemsCount = computed(() => order.value?.line_items.length)

  const setOrder = (orderItem: OrderType) => {
    order.value = orderItem
  }

  return { cartItems, itemsCount, setOrder, order }
})

if (import.meta.hot) import.meta.hot.accept(acceptHMRUpdate(useOrderStore, import.meta.hot))
