import { IStockCollectionInterface } from '~/apps/stocks/interfaces/StockInterfaces'
import { ProfileType } from '~/types/ProfileTypes'

export interface StocksProfileType extends ProfileType {
  collections: Array<IStockCollectionInterface>
}
