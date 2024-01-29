// useAxiosInterceptors.ts

import { ref} from 'vue'
// import { onUnmounted } from 'vue' // Bu satırı ben kaldırdım. Nuri Akman
import axios from 'axios'

export function useAxiosInterceptors() {
  // Composable içinde state tanımlayabilirsiniz
  const requestInterceptor = ref<number | null>(null)
  const responseInterceptor = ref<number | null>(null)
  // Axios request interceptor'ı
  const setupRequestInterceptor = () => {
    requestInterceptor.value = axios.interceptors.request.use(
      (config) => {
        // Her bir axios çağrısında buraya geliyoruz
        // İstek gönderilmeden önce çalışan kod
        const token = localStorage.getItem('token')
        if (token) {
          // Eğer token varsa, Authorization başlığını güncelle
          config.headers.Authorization = `Bearer ${token}`
        }
        return config
      },
      (error) => {
        // Hata durumunda çalışan kod
        return Promise.reject(error)
      }
    )
  }

  // Axios response interceptor'ı
  const setupResponseInterceptor = () => {
    responseInterceptor.value = axios.interceptors.response.use(
      (response) => {
        // İstek başarılı olduğunda çalışan kod
        return response
      },
      (error) => {
        // İstek hatalı olduğunda çalışan kod
        return Promise.reject(error)
      }
    )
  }

  // Composable'in clean-up işlevi
  const cleanupInterceptors = () => {
    if (requestInterceptor.value !== null) {
      axios.interceptors.request.eject(requestInterceptor.value)
    }
    if (responseInterceptor.value !== null) {
      axios.interceptors.response.eject(responseInterceptor.value)
    }
  }

  // Composable'in destroy edildiğinde interceptors'ları temizle
  // onUnmounted(cleanupInterceptors) // Bu satırı ben kaldırdım. Nuri Akman

  // Composable'in dışa açılacak fonksiyonları
  return {
    setupRequestInterceptor,
    setupResponseInterceptor,
    cleanupInterceptors
  }
}
