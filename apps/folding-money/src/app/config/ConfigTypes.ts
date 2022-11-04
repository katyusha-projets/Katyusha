export type Applications = 'ecommerce' | 'food' | 'stocks'

export interface IAppConfig {
  app: Applications
  logo: string
  api: {
    url: string
  }
  layout: {
    header: {
      user: {
        links: Array<{
          icon: string
          title: string
          location: string
        }>
      }
    }
    sidebar: {
      banner: {
        title: string
        subtitle: string
        image: string
        button: {
          title: string
          link: string
        }
      }
      links: Array<{
        icon: string
        title: string
        location: string
      }>
    }
    tabBar: {
      items: Array<{
        id: string
        icon: string
        title: string
        modalKey: string
      }>
    }
  }
}
