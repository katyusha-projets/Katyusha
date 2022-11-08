export const appLogo = '/logo/logo.svg'
export const appLogoWhite = '/logo/logo-white.svg'
export const appName = 'Katyusha'

export const menuLinks = (): Array<{title: string, location: string, icon: string}> => {
  return [
  ]
}

export const currencySymbol = '$'

export const tabBarItems = [
  {
    id: 'categories',
    icon: 'bars',
    title: 'Categories',
    component: {
      // name: CategoryImageListing
    }
  },
  {
    id: 'search',
    icon: 'magnifying-glass',
    title: 'Search',
    component: {
      // name: TabBarComponent,
      results: { resultsPropKey: 'groups', resultsListComponent: 'GroupsList' },
      search: { placeholder: 'Search for groups', label: 'Groups', searchCallback: async (term: string): Promise<void> => {
        // return GroupResource.termSearch(term)
      } }
    }
  },
  {
    id: 'favorites',
    icon: 'heart',
    title: 'Favorites',
    component: {
      // name: null
    }
  },
  {
    id: 'profile',
    icon: 'user',
    title: 'Profile',
    component: {
      // name: AccountModal
    }
  }
]
export const footerLinks = (): Array<object> => {
  return [
    { location: '#', title: 'Terms and conditions' },
    { location: '#', title: 'Contact' },
    { location: '#', title: 'About' },
    { location: '#', title: 'Press' }
  ]
}
