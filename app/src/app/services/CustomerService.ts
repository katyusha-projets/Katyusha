import Service from '~/app/services/Service'
import { CustomerType } from '~/types/CustomerTypes'

export default class CustomerService extends Service<CustomerType> {
  protected resource: string = 'customer'

}

