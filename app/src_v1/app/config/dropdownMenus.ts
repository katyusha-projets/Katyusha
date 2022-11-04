import { DropdownMenuProps } from '~/components/common/types'
import { BeakerIcon } from '@heroicons/vue/24/outline'

export const userMenuDropdown = (): DropdownMenuProps => {
  return {
    title: 'User menu',
    items: [
      { title: 'Patrick', 'icon': BeakerIcon }
    ]
  }
}
