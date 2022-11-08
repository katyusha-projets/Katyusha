import Api from "~/app/api/Api";
import {IProfile, IUser} from "~/app/interfaces/UserInterfaces";
import {IPortfolio} from "~/app/interfaces/PortfolioInterfaces";
import {ITicker} from "~/app/interfaces/TickerInterfaces";

export default class TickerApi extends Api<ITicker> {
    protected resource: string = 'ticker'


    public async follow(ticker_id: string): Promise<void> {
        await this._get(`${ticker_id}/follow`)
    }

    public async unfollow(ticker_id: string): Promise<void> {
        await this._get(`${ticker_id}/unfollow`)
    }

    public async setPortfolios(ticker_id: string, portfolios: Array<string>): Promise<void> {
        await this._post(`${ticker_id}/set-user-portfolios`, { portfolios })
    }
}