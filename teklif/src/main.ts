import '@/../node_modules/@picocss/pico/css/pico.min.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from '@/App.vue'
import router from '@/router/router'

const app = createApp(App)
app.use(createPinia())
app.use(router)
app.mount('#app')

// ##### Axios Ayarları
import axios from 'axios'
import { useAxiosInterceptors } from '@/composables/useAxiosInterceptors'
const axiosInstance = useAxiosInterceptors()
const { setupRequestInterceptor, setupResponseInterceptor } = useAxiosInterceptors()

setupRequestInterceptor()
setupResponseInterceptor()

axios.defaults.baseURL = 'http://localhost/vue/teklif/public/api' // Sonunda '/' yok!
axios.defaults.timeout = 5000 // 5 saniye
axios.defaults.headers.post['Content-Type'] = 'application/json' // PHP ile iletişim JSON formatındaki veri ile yapılacak
// axios.defaults.headers.common['Authorization'] = `Bearer ${token}` // Varsa JWT'yi ekle
// axios.defaults.headers.common['Authorization'] = AUTH_TOKEN
// axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded' //  // PHP ile iletişim $_POST ile yapılacak
app.config.globalProperties.$axios = axiosInstance
