import Service from '~/app/services/Service'
import { StockType } from '~/types/StockTypes'

export default class StocksService extends Service<StockType> {
  protected resource: string = 'stock'

  public async setIndexes(ticker_id: string, indexes: Array<string>): Promise<void> {
    await this._post('index/save-user-indexes', { indexes, ticker_id })
  }
}
