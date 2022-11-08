import AddItemToOrderAction from '~/app/actions/orders/AddItemToOrderAction'
import { LineItemDTO } from '~/app/DTOs/LineItemDTO'
import Toast from '~/core/utils/Toast'
import LineItemService from '~/app/services/LineItemService'
import StateLoaders from '~/store/StateLoaders'
const lineItemService = new LineItemService()

export const useCart = () => {

  const addItemToCart = async (lineItem: LineItemDTO): Promise<void> => {
    Toast.loading()
    await AddItemToOrderAction.run(lineItem)
    Toast.addedToCart()
  }

  const removeLineItem = async (lineItemId: string): Promise<void> => {
    Toast.loading()
    await lineItemService.delete(lineItemId)
    Toast.lineItemRemoved()
    await StateLoaders.loadActiveOrder()
  }

  const updateQty = async(lineItemId: string, newQty: number): Promise<void> => {
    Toast.loading()
    await lineItemService.updateQty(lineItemId, newQty)
    await StateLoaders.loadActiveOrder()
  }

  return { addItemToCart, removeLineItem, updateQty }
}
