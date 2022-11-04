export type Applications = 'ecommerce' | 'food' | 'stocks'

export interface IAppConfig {
  app: Applications
  logo: string
  api: {
    url: string
  }
  layout: {
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
