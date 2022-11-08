import { Action } from '~/app/actions/Action'
import { LineItemDTO } from '~/app/DTOs/LineItemDTO'
import $services from '~/app/services'
import StateLoaders from '~/store/StateLoaders'

export default class AddItemToOrderAction extends Action {
  protected static urlPath: string = 'order/add-item'

  public static async run(item: LineItemDTO): Promise<void> {
    const order = await $services.order.loadActiveOrder()
    if(!order) throw new Error('Order for the cart not found on loadActiveOrder method')
    item.order_id = order.id
    await this.sendRequest(item)
    await StateLoaders.loadActiveOrder()
  }
}
