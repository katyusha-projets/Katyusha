import Service from '~/app/services/Service'
import { ProductType } from '~/types/CatalogTypes'

export default class ProductService extends Service<ProductType> {
  protected resource: string = 'product'

  public async getFeatured(): Promise<Array<ProductType>> {
    return this.get('featured')
  }

  public async getFavorites(): Promise<Array<ProductType>> {
    return this.get('favorites')
  }
}
