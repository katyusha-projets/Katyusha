import { Stripe, StripeElementsOptions, loadStripe } from '@stripe/stripe-js'
import { StripePaymentIntentDTO } from '~/app/DTOs/StripePaymentIntentDTO'

export default class StripeClient {

  public constructor(protected paymentIntent: StripePaymentIntentDTO) {}

  public async handleSubmit (e: Event, stripe: Stripe, elements: any): Promise<any> {
    e.preventDefault()

    const { error } = await stripe.confirmPayment({
      elements,
      confirmParams: {
        // Make sure to change this to your payment completion page
        return_url: 'http://127.0.0.1:3333'
      }
    })

    // This point will only be reached if there is an immediate error when
    // confirming the payment. Otherwise, your customer will be redirected to
    // your `return_url`. For some payment methods like iDEAL, your customer will
    // be redirected to an intermediate site first to authorize the payment, then
    // redirected to the `return_url`.
    if (error.type === 'card_error' || error.type === 'validation_error') {
      alert(error.message)
    } else {
      alert('An unexpected error occurred.')
    }

    // stripe.setLoading(false)
  }
  protected async getClient(): Promise<Stripe> {
    const stripe = await loadStripe(this.paymentIntent.publishableKey)
    if(!stripe) throw new Error('Failed to load Stripe client')
    return stripe
  }

  protected getElementsOptions(): StripeElementsOptions {
    return {
      clientSecret: this.paymentIntent.clientSecret
    }
  }

  public async render(element: string): Promise<void> {
    const client = await this.getClient()
    const elements = client.elements(this.getElementsOptions())
    const paymentElement = elements.create('payment')
    paymentElement.mount(element)

    // @ts-ignore
    document?.querySelector('#payment-form').addEventListener('submit', (e: Event) => this.handleSubmit(e, client, elements))
  }

}
