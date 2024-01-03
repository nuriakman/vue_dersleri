import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import IletisimView from '../views/IletisimView.vue'
import AdresSecView from '../views/AdresSecView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/iletisim',
      name: 'iletisim',
      component: IletisimView
    },
    {
      path: '/adressec',
      name: 'adressec',
      component: AdresSecView
    }
  ]
})

export default router
