import { acceptHMRUpdate, defineStore } from 'pinia'
import { Ref } from 'vue-demi'
import StocksService from '~/apps/stocks/services/StocksService'
import { useProductService } from '~/composables/useProductService'
import { ProductType } from '~/types'
import { StockType } from '~/types/StockTypes'
const productService = useProductService()
const stockService = new StocksService()

type ModalStateType = {
  stock: Ref<boolean>
  categories: Ref<boolean>
  search: Ref<boolean>
  profile: Ref<boolean>
  favorites: Ref<boolean>
  cart: Ref<boolean>
  product: Ref<boolean>
}

type ModalDataType = {
  stock: Ref<StockType|null>
  product: Ref<ProductType|null>
}

export const useModalStore = defineStore('modal', () => {
  const modalState: ModalStateType = {
    stock: ref<boolean>(false),
    categories: ref<boolean>(false),
    search: ref<boolean>(false),
    profile: ref<boolean>(false),
    favorites: ref<boolean>(false),
    cart: ref<boolean>(false),
    product: ref<boolean>(false)
  }

  const data: ModalDataType = {
    stock: ref(null),
    product: ref(null)
  }

  const isAModalOpen = computed(function(): boolean {
    const res: Array<string> = []
    Object.keys(modalState).forEach((key: any) => {
      // @ts-ignore
      if(modalState[key].value) res.push(key)
    })

    return !!res.length
  })

  const open: Record<string, any> = {
    stock: () => {
      closeAll()
      modalState.stock.value = true
    },

    categories: () => {
      closeAll()
      modalState.categories.value = true
    },

    search: () => {
      closeAll()
      modalState.search.value = true
    },

    profile: () => {
      closeAll()
      modalState.profile.value = true
    },

    favorites: () => {
      closeAll()
      modalState.favorites.value = true
    },

    cart: () => {
      closeAll()
      modalState.cart.value = true
    }
  }

  const close: Record<string, () => {}> = {
    stock: () => modalState.stock.value = false,
    categories: () => modalState.categories.value = false,
    search: () => modalState.search.value = false,
    profile: () => modalState.profile.value = false,
    // @ts-ignore
    favorites: () => {
      modalState.favorites.value = false; console.log('closing fav')
    },
    cart: () => modalState.cart.value = true
  }

  const closeAll = () => {
    Object.keys(modalState).forEach((key: any) => {
      // @ts-ignore
      modalState[key].value = false
    })
  }

  const openStock = async (stockNamespace: string) => {
    closeAll()
    modalState.stock.value = true
    data.stock.value = await stockService.get(stockNamespace)
  }

  const closeStock =  () => {
    modalState.stock.value = false
    data.stock.value = null
  }

  const openProduct = async (productNamespace: string) => {
    closeAll()
    await productService.get(productNamespace)
    modalState.product.value = true
    data.product.value = productService.product.value
  }

  const closeProduct =  () => {
    console.log('Clsoing procud')
    modalState.product.value = false
    data.product.value = null
  }

  return {
    closeAll,
    isAModalOpen,
    open,
    close,
    modalState,
    data,
    openProduct,
    closeProduct,
    openStock,
    closeStock
  }
})

if (import.meta.hot) import.meta.hot.accept(acceptHMRUpdate(useOrderStore, import.meta.hot))
