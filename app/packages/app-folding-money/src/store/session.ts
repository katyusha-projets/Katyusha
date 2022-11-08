import { acceptHMRUpdate, defineStore } from 'pinia'
import {ISession, IUser} from "~/app/interfaces/UserInterfaces";

export const useSessionStore = defineStore('session', () => {
  const user = ref<IUser|null>(null)

  // const previousNames = ref(new Set<string>())
  // const usedNames = computed(() => Array.from(previousNames.value))

  const setSession = (sess: IUser) => {
    user.value = sess
  }

  return {
    setSession,
    user
  }
})

if (import.meta.hot) import.meta.hot.accept(acceptHMRUpdate(useSessionStore, import.meta.hot))
