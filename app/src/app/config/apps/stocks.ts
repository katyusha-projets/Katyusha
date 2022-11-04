import { IAppConfig } from '~/app/config/ConfigTypes'

const config: IAppConfig = {
  app: 'stocks',
  logo: '/apps/stocks/logo.svg',
  api: {
    url: 'https://api.katyusha.ch'
  },
  layout: {
    tabBar: {
      items: [
        { id: 'stocks', icon: 'chart-mixed', title: 'Stocks', modalKey: 'stocksOverview' },
        // { id: 'xxx', icon: 'bolt', title: '', modalKey: '' },
        { id: 'xxxxx', icon: 'user', title: 'Account', modalKey: 'stocksUserProfile' },
        { id: 'xxxxx', icon: 'gem', title: 'Premium', modalKey: 'stockPremiumMembership' }
      ]
    }
  }
}

export default config
