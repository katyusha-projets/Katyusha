import CreateNewOrderAction from '~/app/actions/orders/CreateNewOrderAction'
import { StripeCallbackDTO } from '~/app/DTOs/StripeCallbackDTO'
import { StripeCallbackProcessingResponse } from '~/app/DTOs/StripeCallbackProcessingResponse'
import { StripePaymentIntentDTO } from '~/app/DTOs/StripePaymentIntentDTO'
import Service from '~/app/services/Service'
import StripeClient from '~/clients/stripe/StripeClient'
import { useStore } from '~/composables/useStore'
import { OrderType } from '~/types/OrderTypes'

export default class OrderService extends Service<OrderType> {
  protected resource: string = 'order'

  public async stripeCheckout(): Promise<StripeClient> {
    const paymentIntent: StripePaymentIntentDTO = await this.checkout('stripe')
    return new StripeClient(paymentIntent)
  }

  public async handleStripeCallback(callback: StripeCallbackDTO): Promise<StripeCallbackProcessingResponse> {
    return this._get('callback/stripe', callback)
  }

  protected async checkout(paymentProvider: string): Promise<StripePaymentIntentDTO> {
    const order = await this.loadActiveOrder(false)
    if(!order) throw new Error('No order found for checkout')
    return this._get(`${order.id}/checkout/${paymentProvider}`)
  }

  public async loadActiveOrder(createOnNotExisting: boolean = true): Promise<OrderType|null> {
    const session = useStore().user.session
    if(!session) return null
    const session_id = session.id
    const { active_order_id } = session
    console.log(session)

    if(!active_order_id) {
      if(!createOnNotExisting) return null

      if(!session_id) throw new Error('Failed to create order - session_id not found')
      await CreateNewOrderAction.run({ session_id })
      const session = StateGetters.getCurrentSession()
      if(!session) throw new Error('Failed to create order - no session')
      const { active_order_id } = session
      if(!active_order_id) throw new Error('No active_order_id on attempting to create an order after not finding one')
      return this.get(active_order_id)
    }

    return this.get(active_order_id)
  }
}
