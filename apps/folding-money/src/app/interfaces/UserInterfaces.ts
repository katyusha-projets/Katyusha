import {IPortfolio} from "~/app/interfaces/PortfolioInterfaces";
import {ITicker} from "~/app/interfaces/TickerInterfaces";

export interface IUser {
    id: string
    email: string
    username: string
    avatar?: string
    banner?: string
    tagline?: string
    portfolios: Array<IPortfolio>
    tickers_watching: Array<ITicker>
}

export interface ISession extends IUser {

}

export interface IProfile extends IUser {

}