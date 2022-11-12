import { acceptHMRUpdate, defineStore } from 'pinia'
import { SessionType } from '~/types/SessionType'

export const useUserStore = defineStore('user', () => {
  const session = ref<SessionType>({})

  // const previousNames = ref(new Set<string>())
  // const usedNames = computed(() => Array.from(previousNames.value))

  const setSession = (sess: SessionType) => {
    session.value = sess
  }

  return {
    setSession,
    session
  }
})

if (import.meta.hot) import.meta.hot.accept(acceptHMRUpdate(useUserStore, import.meta.hot))
