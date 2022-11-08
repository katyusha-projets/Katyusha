import Service from '~/app/services/Service'
import { LineItemType } from '~/types/OrderTypes'

export default class LineItemService extends Service<LineItemType> {
  protected resource: string = 'line-item'

  public updateQty(lineItemId: string, qty: number): Promise<void> {
    return this._get(`${lineItemId}/qty/${qty}`)
  }
}
