import { IAppConfig } from '~/app/config/ConfigTypes'

const config: IAppConfig = {
  app: 'ecommerce',
  logo: '/apps/ecommerce/logo.svg',
  api: {
    url: 'https://api.katyusha.ch'
  },
  layout: {
    tabBar: {
      items: [
        { id: 'favorites', icon: 'heart', title: 'Favorites', modalKey: 'favorites' },
        { id: 'cart', icon: 'basket-shopping-simple', title: 'Cart', modalKey: 'cart' },
        { id: 'user', icon: 'user', title: 'Account', modalKey: 'profile' }
      ]
    }
  }
}

export default config
