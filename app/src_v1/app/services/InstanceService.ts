import Service from '~/app/services/Service'
import { InstanceType } from '~/types/InstanceTypes'

export default class InstanceService extends Service<InstanceType> {
  protected resource: string = 'instance'
}

