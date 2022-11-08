import Service from '~/app/services/Service'
import { ProfileType } from '~/types/ProfileTypes'

export default class ProfileService extends Service<ProfileType> {
  protected resource: string = 'profile'
}

