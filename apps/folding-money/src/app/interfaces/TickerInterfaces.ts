import {IUser} from "~/app/interfaces/UserInterfaces";

export interface ITicker {
    id: string
    name: string
    ticker: string
    description: string
    logo: string
    followers: Array<IUser>
}