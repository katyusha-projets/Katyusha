import Log from '~/app/Log'
import OrderService from '~/app/services/OrderService'
import StateLoaders from '~/store/StateLoaders'

export default class Bootstrap {

  public static async app(): Promise<void> {
    Log.message('App bootstrap called')
    await StateLoaders.loadCurrentSession()
    await StateLoaders.loadActiveOrder()
    await this.processAvailableCallbacks()
    await StateLoaders.loadFavoriteProducts()
  }

  protected static async processAvailableCallbacks(): Promise<void> {
    const orderService = new OrderService()
    const url = new URL(document.location.href)
    const paymentIntent = url.searchParams.get('payment_intent')
    const paymentIntentClientSecret = url.searchParams.get('payment_intent_client_secret')

    if(paymentIntent && paymentIntentClientSecret) {
      await orderService.handleStripeCallback({ paymentIntent, paymentIntentClientSecret })
    }
  }

}
