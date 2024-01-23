import './../node_modules/@picocss/pico/css/pico.min.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import axios from 'axios'

axios.defaults.baseURL = 'http://localhost/vue/teklif/public/api' // Sonunda '/' yok!
axios.defaults.timeout = 2500 // 2.5 saniye
// axios.defaults.headers.common['Authorization'] = AUTH_TOKEN
// axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded' //  // PHP ile iletişim $_POST ile yapılacak
axios.defaults.headers.post['Content-Type'] = 'application/json' // PHP ile iletişim JSON formatındaki veri ile yapılacak

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.config.globalProperties.$axios = axios

app.mount('#app')
