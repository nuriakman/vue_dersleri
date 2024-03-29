import { defineStore } from 'pinia'
import { computed, reactive } from 'vue'
import jwtDecode from 'jwt-decode'

interface User {
  id: number
  name: string
  isLoggedIn: boolean
}

// JwtPayload tipini tanımlayalım
interface JwtPayload {
  sub: number
  exp: number
  adisoyadi: string
}

export const useGlobalStore = defineStore('global', () => {
  // stage variables
  const user = reactive<User>({ id: 0, name: '', isLoggedIn: false })

  // computed variables
  const isLoggedIn = computed(() => user.isLoggedIn)

  // methods/actions
  function getUserInfoFromStoredToken() {
    const token = localStorage.getItem('token')
    if (token) {
      const decoded = jwtDecode<JwtPayload>(token)
      user.id = decoded.sub
      user.name = decoded.adisoyadi
      user.isLoggedIn = true
      return true // Kullanıcının token'ı var
    }
    return false // Kullanıcının token'ı yok.
  }

  function login(utoken: string): boolean {
    const decoded = jwtDecode<JwtPayload>(utoken)
    if (decoded && decoded.sub && decoded.adisoyadi) {
      user.id = decoded.sub
      user.name = decoded.adisoyadi
      user.isLoggedIn = true
      localStorage.setItem('token', utoken as string)
      return true
    }
    // Eğer decoded uygun değilse giriş yapma işlemi başarısız olmalı
    return false
  } // login

  function logout() {
    user.id = 0
    user.name = ''
    user.isLoggedIn = false
    localStorage.removeItem('token')
    localStorage.clear() // Her şeyi sil
  } // logout

  return { user, isLoggedIn, login, logout, getUserInfoFromStoredToken }
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
