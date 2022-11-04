import { Action } from '~/app/actions/Action'
import { OrderDTO } from '~/app/DTOs/OrderDTO'
import StateLoaders from '~/store/StateLoaders'

export default class CreateNewOrderAction extends Action {
  protected static urlPath: string = 'order/create'

  public static async run(order: OrderDTO): Promise<void> {
    await this.sendRequest(order)
    await StateLoaders.loadCurrentSession()
  }
}
