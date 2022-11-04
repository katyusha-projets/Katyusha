import $services from '~/app/services'
import { useCatalogStore } from '~/store/catalog'
import { useOrderStore } from '~/store/order'

export default class StateLoaders {
  public static async loadCurrentSession(): Promise<void> {
    const session = await $services.session.loadOrCreateSession()
    useUserStore().setSession(session)
  }

  public static async loadActiveOrder(): Promise<void> {
    const order = await $services.order.loadActiveOrder(false)
    if(order) useOrderStore().setOrder(order)
  }

  public static async loadFavoriteProducts(): Promise<void> {
    const products = await $services.product.getFavorites()
    useCatalogStore().setFavorites(products)
  }
}
