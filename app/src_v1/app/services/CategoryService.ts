import Service from '~/app/services/Service'
import { CategoryType } from '~/types/CatalogTypes'

export default class CategoryService extends Service<CategoryType> {
  protected resource: string = 'category'
}

