import { ref } from 'vue'

const token = ref(localStorage.getItem('token') || null)

const setToken = (newToken) => {
  localStorage.setItem('token', newToken)
  token.value = newToken
}

const clearToken = () => {
  localStorage.removeItem('token')
  token.value = null
}

const useJwt = () => {
  return {
    token,
    setToken,
    clearToken
  }
}

export default useJwt
