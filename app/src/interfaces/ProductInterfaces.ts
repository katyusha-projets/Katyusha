export interface IProduct {
  id: string
  instance_id: string
  name: string
  namespace: string
  description: string
  image: string
  active: boolean
  price: number
  sale_price?: number
  sale_price_until?: Date
  category_id: string
  deleted_at?: Date
  category: ICategory
}

export interface ICategory {
  id: string
  instance_id: string
  name: string
  namespace: string
  sale_discount: number
  sale_discount_until: Date
  image: string
  tax_rate_percent: number
  emoji: string
  products: Array<IProduct>
}

export interface IVariation {
  id: string
  product_id: string
  price: number
  sale_price: number
  sale_price_until: Date
  deleted_at: Date
  name: string
}
