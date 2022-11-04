import {ITicker} from "~/app/interfaces/TickerInterfaces";
import {IUser} from "~/app/interfaces/UserInterfaces";

export interface IPortfolio {
    id: string
    name: string
    namespace: string
    user_id: string
    image?: string
    tickers: Array<ITicker>
    user: IUser
}