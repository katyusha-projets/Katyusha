import Api from "~/app/api/Api";
import {IProfile, IUser} from "~/app/interfaces/UserInterfaces";
import {IPortfolio} from "~/app/interfaces/PortfolioInterfaces";

export default class PortfolioApi extends Api<IPortfolio> {
    protected resource: string = 'portfolio'
}