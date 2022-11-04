import Api from "~/app/api/Api";
import {IProfile, ISession, IUser} from "~/app/interfaces/UserInterfaces";

export default class UserApi extends Api<IUser> {
    protected resource: string = 'user'

    public async loadSession(): Promise<ISession> {
        return await this.get('session')
    }

    public async profile(username: string): Promise<IProfile> {
        return await this.get(`${username}/profile`)
    }
}