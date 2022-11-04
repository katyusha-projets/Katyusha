import CategoryService from '~/app/services/CategoryService'
import CustomerService from '~/app/services/CustomerService'
import InstanceService from '~/app/services/InstanceService'
import LineItemService from '~/app/services/LineItemService'
import OrderService from '~/app/services/OrderService'
import ProductService from '~/app/services/ProductService'
import SessionService from '~/app/services/SessionService'

export interface ServicesInterface {
  category: CategoryService
  customer: CustomerService
  instance: InstanceService
  lineItem: LineItemService
  order: OrderService
  product: ProductService
  session: SessionService
}

const $services =  {
  category: new CategoryService(),
  customer: new CustomerService(),
  instance: new InstanceService(),
  lineItem: new LineItemService(),
  order:    new OrderService(),
  product:  new ProductService(),
  session:  new SessionService()
}

export default $services
