import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import VuetifyView from '../views/VuetifyView.vue'
import PiniaView from '../views/PiniaView.vue'
import SayacView from '../views/SayacView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/vuetify',
      name: 'vuetify',
      component: VuetifyView
    },
    {
      path: '/pinia',
      name: 'piniaTest',
      component: PiniaView
    },
    {
      path: '/sayac',
      name: 'sayac',
      component: SayacView
    }
  ]
})

export default router
