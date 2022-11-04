import Service from '~/app/services/Service'
import { ProfileType } from '~/types/ProfileTypes'
import { StockIndexType } from '~/types/StockTypes'

export default class StockIndexService extends Service<StockIndexType> {
  protected resource: string = 'stock/index'

  public async createIndex(customer_id: string, name: string): Promise<StockIndexType> {
    return await super.create<StockIndexType>({ customer_id, name })
  }

  public async getForCurrentUser(): Promise<Array<StockIndexType>> {
    return this.get<Array<StockIndexType>>(`current-user`)
  }

  public async getByProfile(profileId: string): Promise<Array<StockIndexType>> {
    return this.get<Array<StockIndexType>>(`customer/${profileId}`)
  }

  public async getIndexFollowers(indexId: string): Promise<Array<ProfileType>> {
    return this.get<Array<ProfileType>>(`${indexId}/followers`)
  }
  public async getIndexesFollowed(profileId: string): Promise<Array<StockIndexType>> {
    return this.get<Array<StockIndexType>>(`user/followed/${profileId}`)
  }

  public async follow(indexId: string): Promise<void> {
    await this.get(`${indexId}/follow`)
  }

  public async unfollow(indexId: string): Promise<void> {
    await this.get(`${indexId}/unfollow`)
  }

  public async addTicker(indexId: string, tickerId: string): Promise<void> {
    await this.get(`ticker/add/${indexId}/${tickerId}`)
  }

  public async removeTicker(indexId: string, tickerId: string): Promise<void> {
    await this.get(`ticker/remove/${indexId}/${tickerId}`)
  }
}
