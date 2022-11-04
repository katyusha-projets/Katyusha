import { Action } from '~/app/actions/Action'
import StateLoaders from '~/store/StateLoaders'

export default class AddToFavoritesAction extends Action {
  protected static urlPath: string = 'favorites/add'

  public static async run(productId: string): Promise<void> {
    await this.sendRequest({}, this.urlPath + '/' + productId)
    await StateLoaders.loadFavoriteProducts()
  }
}
