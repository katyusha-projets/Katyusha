import UserApi from "~/app/api/UserApi";
import {IUser} from "~/app/interfaces/UserInterfaces";
import PortfolioApi from "~/app/api/PortfolioApi";
import {IPortfolio} from "~/app/interfaces/PortfolioInterfaces";

export const usePortfolio = () => {
  const api = new PortfolioApi()
  const portfolio = ref<IPortfolio|null>(null)

  const loadPortfolio = async (id: string): Promise<void> => {
    portfolio.value = await api.get(id)
  }

  return {
    portfolio,
    loadPortfolio
  }
}