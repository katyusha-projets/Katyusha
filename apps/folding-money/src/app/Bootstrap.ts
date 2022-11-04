import StateLoaders from "~/store/StateLoaders";

export default class Bootstrap {

  public static async app(): Promise<void> {
    // await StateLoaders.loadCurrentShop()
    await StateLoaders.loadCurrentSession()
    // await StateLoaders.loadActiveOrder()
    // await this.processAvailableCallbacks()
    // await StateLoaders.loadFavoriteProducts()
  }


}
