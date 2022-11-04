import StockIndexService from '~/apps/stocks/services/StockIndexService'
import { ProfileType } from '~/types/ProfileTypes'
import { StockIndexType } from '~/types/StockTypes'
import _ from 'lodash'
import { useStore } from '~/composables/useStore'

export const useStockIndex = () => {
  const store = useStore()
  const service = new StockIndexService()
  const index = ref<StockIndexType | null>(null)
  const followers = ref<Array<ProfileType>>([])

  const followerIds = computed<Array<string>>(() => _.map(followers.value, 'id'))
  const isUserFollowing = computed<boolean>(() => {
    let is = false
    followerIds.value.forEach((id: string) => {
      if(id === store.user.session.customer_id) is = true
    })

    return is
  })

  const loadIndex = async (indexNamespace: string): Promise<void> => {
    index.value = await service.get(indexNamespace)
    await getFollowers()
  }

  const follow = async (): Promise<void> => {
    await service.follow(index.value!.id)
    await getFollowers()
  }

  const unfollow = async (): Promise<void> => {
    await service.unfollow(index.value!.id)
    await getFollowers()
  }

  const getFollowers = async (): Promise<void> => {
    followers.value = await service.getIndexFollowers(index.value!.id)
  }

  return {
    followerIds,
    isUserFollowing,
    loadIndex,
    index,
    follow,
    unfollow,
    followers
  }
}
