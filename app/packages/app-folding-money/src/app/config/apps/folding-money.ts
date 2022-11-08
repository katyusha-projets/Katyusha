import { IAppConfig } from '~/app/config/ConfigTypes'

const config: IAppConfig = {
  app: 'stocks',
  logo: '/apps/stocks/logo.svg',
  api: {
    url: 'https://api.katyusha.ch'
  },
  layout: {
    header: {
      user: {
        links: [
          {icon: 'user', title: 'Profile', location: '/me/'},
          {icon: 'sliders', title: 'Settings', location: '/me/settings'},
        ]
      }
    },
    sidebar: {
      banner: {
        title: 'Join us on Discord!',
        subtitle: 'Discuss and share with other members!',
        image: 'https://ui8-unity-gaming.herokuapp.com/img/sidebar-banner.png',
        button: {
          title: 'Join Our Server',
          link: '#'
        }
      },
      links: [
        {icon: 'chart-mixed', title: 'Dashboard', location: '/'},
        {icon: 'file-chart-column', title: 'My Portfolios', location: '/me/portfolios'},
        {icon: 'bolt', title: 'My Watch list', location: '/me/watching'},
      ]
    },
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
