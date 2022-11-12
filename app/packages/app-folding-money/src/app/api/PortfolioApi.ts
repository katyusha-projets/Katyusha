import Api from "~/app/api/Api";
import {IPortfolio} from "~/app/interfaces/PortfolioInterfaces";

export default class PortfolioApi extends Api<IPortfolio> {
    protected resource: string = 'portfolio'

  public async loadByUser(userId: string): Promise<Array<IPortfolio>> {
      return this._get(`/user/${userId}`)
  }
}
