export interface LineItemDTO {
  order_id?: string
  product_id: string
  qty: number
  notes?: string
  variation_id: string|null
}
