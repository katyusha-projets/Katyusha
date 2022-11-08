import { ProductType } from '~/types/CatalogTypes'

export type OrderType = {
  id: string
  instance_id: string
  customer_id: string
  state: string
  session_id: string
  paymentAmount: number
  deleted_at: Date
  payment?: PaymentType
  line_items: Array<LineItemType>
}

export type PaymentType = {
  id: string
  order_id: string
  provider: string
  status: string
  amount_due: number
  amount_paid: number
  amount_captured: number
  attempted_at: Date
  paid_at: Date
  failed_at: Date
  payment_provider_id: string
  currency: string
  redirect_url: string
  api_response: object
  created_at: Date
  settled: boolean
  payment_intent_response: object
}

export type LineItemType = {
  id: string
  product_id: string
  order_id: string
  qty: number
  priceTotal: number
  original_unit_price: number
  discount_amount: number
  payable_unit_price: number
  tax_rate_percent: number
  notes: string
  product: ProductType
}
