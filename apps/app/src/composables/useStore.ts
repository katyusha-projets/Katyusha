import { useUserStore } from '~/store/user'

export const useStore = () => {
  const user = useUserStore()

  return {
    user
  }
}
