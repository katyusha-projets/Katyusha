import UserApi from "~/app/api/UserApi";
import {IUser} from "~/app/interfaces/UserInterfaces";
import PortfolioApi from "~/app/api/PortfolioApi";
import {IPortfolio} from "~/app/interfaces/PortfolioInterfaces";

export const usePortfolio = () => {
  const api = new PortfolioApi()
  const portfolio = ref<IPortfolio|null>(null)
  const portfolioList = ref<Array<IPortfolio>>([])



  const loadPortfolioList = async (userId: string): Promise<void> => {
    portfolioList.value = await api.loadByUser(userId)
  }

  const loadPortfolio = async (id: string): Promise<void> => {
    portfolio.value = await api.get(id)
  }

  return {
    portfolioList,
    loadPortfolioList,
    portfolio,
    loadPortfolio
  }
}
