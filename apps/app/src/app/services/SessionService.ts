import Service from '~/app/services/Service'
import { CompanyType } from '~/types/CompanyTypes'
import { SessionType } from '~/types/SessionType'

export default class SessionService extends Service<CompanyType> {
  protected resource: string = 'session'

  public loadOrCreateSession(): Promise<SessionType> {
    return this.get('load-or-create')
  }
}
