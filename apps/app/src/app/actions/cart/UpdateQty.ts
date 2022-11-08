import { Action } from '~/app/actions/Action'
import LineItemService from '~/app/services/LineItemService'
import StateLoaders from '~/store/StateLoaders'

export default class AddToFavoritesAction extends Action {

  public static async run(lineItemId: string, qty: number): Promise<void> {
    const lineItemService = new LineItemService()
    await lineItemService.updateQty(lineItemId, qty)
    await StateLoaders.loadActiveOrder()
  }
}
