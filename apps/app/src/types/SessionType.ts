import { CustomerType } from '~/types/CustomerTypes'

export type SessionType = {
  id?: string
  customer_id?: string
  created_at?: Date
  active_order_id?: string
  instance_id?: string
  customer?: CustomerType
}
