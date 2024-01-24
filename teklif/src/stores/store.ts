import { defineStore } from 'pinia'
import { computed, reactive } from 'vue'

interface User {
  id: number
  name: string
  isLoggedIn: boolean
}

export const useGlobalStore = defineStore('global', () => {
  // stage variables
  const user = reactive<User>({ id: 0, name: '', isLoggedIn: false })

  // computed variables
  const isLoggedIn = computed(() => user.isLoggedIn)

  // methods/actions
  function login(utoken: string, uid: number, uname: string) {
    user.id = uid
    user.name = uname
    user.isLoggedIn = true
    localStorage.setItem('token', utoken)
  }

  function logout() {
    user.id = 0
    user.name = ''
    user.isLoggedIn = false
    localStorage.removeItem('token')
    localStorage.clear() // Her şeyi sil
  }

  return { user, isLoggedIn, login, logout }
})

/*
import { defineStore } from 'pinia'

export const useGlobalStore = defineStore({
  id: 'global',
  state: () => {
    const user = { id: 0, name: '', isLoggedIn: false }
    return { user }
  },
  getters: {
    isLoggedIn: (state) => state.user.isLoggedIn
  },
  actions: {
    login(utoken: string, uid: number, uname: string) {
      this.user = { id: uid, name: uname, isLoggedIn: true }
      localStorage.setItem('token', utoken)
    },
    logout() {
      this.user = { id: 0, name: '', isLoggedIn: false }
      localStorage.removeItem('token')
      localStorage.clear() // Her şeyi sil
    }
  }
})
*/
