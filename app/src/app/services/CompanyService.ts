import Service from '~/app/services/Service'
import { CompanyType } from '~/types/CompanyTypes'

export default class CompanyService extends Service<CompanyType> {
  protected resource: string = 'companies'
}
