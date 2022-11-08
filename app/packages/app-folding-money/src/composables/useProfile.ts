import UserApi from "~/app/api/UserApi";
import {IUser} from "~/app/interfaces/UserInterfaces";

export const useProfile = () => {
  const api = new UserApi()
  const user = ref<IUser|null>(null)

  const loadUser = async (username: string): Promise<void> => {
    user.value = await api.profile(username)
  }

  return {
    user,
    loadUser
  }
}