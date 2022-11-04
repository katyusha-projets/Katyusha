import Service from '~/app/services/Service'
import { ShopType } from '~/types/ShopTypes'

export default class ShopService extends Service<ShopType> {
  protected resource: string = 'shop'
}

