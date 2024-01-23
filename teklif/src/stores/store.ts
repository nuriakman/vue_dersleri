import { ref } from 'vue'
import { defineStore } from 'pinia'

interface User {
  name: string
  mail: string
}

interface Kisi {
  adisoyadi: string
  eposta: string
}

export const useGlobalStore = defineStore('global', () => {
  const kisi: Kisi = { adisoyadi: '', eposta: '' }
  const userId = ref(0)
  const user: User = { name: '', mail: '' }
  const isLoggedIn = ref(false)
  return { userId, user, isLoggedIn, kisi }
})
