export interface StripePaymentIntentDTO {
  amountPayable: number
  amountRequested: number
  clientSecret: string
  publishableKey: string
  transactionId?: string
  testMode: boolean
}
