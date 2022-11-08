import {IUser} from "~/app/interfaces/UserInterfaces";
import {IFinancialDataCollection, IFinancialDataSingleRecords} from "~/app/interfaces/FinancialDataInterfaces";

export interface ITicker {
    id: string
    name: string
    ticker: string
    description: string
    logo: string
    followers: Array<IUser>
    financialData: {
        all: IFinancialDataCollection
        latest: IFinancialDataSingleRecords
        byYear: Array<IFinancialDataSingleRecords>
    }
}