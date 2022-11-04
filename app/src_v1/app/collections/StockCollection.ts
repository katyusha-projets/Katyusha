import Collection from '~/app/collections/Collection'
import { StockType } from '~/types/StockTypes'

export default class StockCollection extends Collection<StockType>{

  public groupedByIndustry(): Record<string, Array<StockType>> {
    return this.groupBy('industry')
  }
}
