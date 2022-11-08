import UserApi from "~/app/api/UserApi";
import {IUser} from "~/app/interfaces/UserInterfaces";
import PortfolioApi from "~/app/api/PortfolioApi";
import {IPortfolio} from "~/app/interfaces/PortfolioInterfaces";
import TickerApi from "~/app/api/TickerApi";
import _ from 'lodash'
import {ITicker} from "~/app/interfaces/TickerInterfaces";
import {useSessionStore} from "~/store/session";
const session = useSessionStore()

export const useTicker = () => {
  const api = new TickerApi()
  const ticker = ref<ITicker|null>(null)

  const loadTicker = async (_ticker: string): Promise<void> => {
    ticker.value = await api.get(_ticker)
  }


  const isCurrentUserFollowing = computed(() => {
    if(!ticker.value || !session.user) return false
    return _.find(ticker.value.followers, {id: session.user.id})
  })

  const reload = async(): Promise<void> => {
    await loadTicker(`${ticker.value?.ticker}`)
  }

  const setStockUserPortfolios = async(portfolioIds: Array<string>): Promise<void> => {
    await api.setPortfolios(`${ticker.value?.id}`, portfolioIds)
  }

  const follow = async(): Promise<void> => {
    await api.follow(`${ticker.value?.id}`)
    await reload()
  }

  const unfollow = async(): Promise<void> => {
    await api.follow(`${ticker.value?.id}`)
    await reload()
  }

  return {
    ticker,
    loadTicker,
    follow,
    unfollow,
    setStockUserPortfolios,
    isCurrentUserFollowing
  }
}