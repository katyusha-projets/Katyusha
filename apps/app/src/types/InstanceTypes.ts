export type InstanceType = {
  id: string
  name: string
  namespace: string
  domain: string
  customer_id: string
  stripe_publishable_key_test: string
  stripe_secret_key_test: string
  stripe_publishable_key_prod: string
  stripe_secret_key_prod: string
  logo: string
  logo_white: string
  stripe_production_mode: boolean
  currency: string
}
